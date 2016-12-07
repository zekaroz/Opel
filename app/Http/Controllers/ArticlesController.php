<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticlesRequest;
use App\Http\Controllers\Controller;
use App\Article;
use App\ArticleImage;
use App\ArticleType;
use App\Brand;
use App\PartType;
use App\BrandModel;
use Illuminate\Http\Response;
use Request;
use Illuminate\Support\Facades\File;
use App\Fileentry;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Alert;

class ArticlesController extends Controller
{
    // this will be the main object controller for this app

    public function __construct() {

        /*
         *this must be changed
         * we want just to be authenticated on Creation and Update
         * for Show it's public.
         *           */
       $this->middleware('auth');
    }

    //
    public function index(){

       $modelsList =  BrandModel::orderBy('name', 'asc')->lists('name','id')->prepend('(all)','');
       $brandsList = Brand::orderBy('name', 'asc')->lists('name','id')->prepend('(all)','');
       $partsList = PartType::orderBy('name', 'asc')->lists('name','id')->prepend('(all)','');
       $articles = Article::orderBy('name', 'asc')->with('articleType','brand','model','partType')->orderBy('name', 'asc')->get();
       $articleTypeList  = ArticleType::lists('name','id')->prepend('(all)','');

         return view('backoffice.articles.index')
                 ->with(compact('modelsList'))
                 ->with(compact('brandsList'))
                 ->with(compact('partsList'))
                   ->with(compact('articles'))
                   ->with(compact('articleTypeList'));
    }

    public function listAll(){
          $brandsList =  Brand::all('name','id');
          $modelsList =  BrandModel::all('name','id', 'brand_id');
          $partsList  =  PartType::all('name','id');

         return view('backoffice.globalArticleSearch')
                ->with(compact('modelsList'))
                ->with(compact('brandsList'))
                ->with(compact('partsList'));
    }

    public function API_All(){
         return  Article::with('articleType','brand','model','partType')->get();
    }

    public function API_models($brandid){

         $brand = Brand::findorFail($brandid);

         return   $brand->models('name','id','brand_id')->get();
    }

    public function show($id){
        $article = Article::findorFail($id);

        return view('backoffice.articles.show', compact('article'));
    }

    public function create(){
        $modelsList =  BrandModel::orderBy('name', 'asc')->lists('name','id')->prepend('(all)','');
        $brandsList = Brand::orderBy('name', 'asc')->lists('name','id')->prepend('(all)','');
        $partsList = PartType::orderBy('name', 'asc')->lists('name','id')->prepend('(all)','');
        $articleTypesList = ArticleType::orderBy('name', 'asc')->lists('name','id')->prepend('(choose one)','');

        return view('backoffice.articles.create' )
                    ->with(compact('brandsList'))
                    ->with(compact('partsList'))
                    ->with(compact('modelsList'))
                    ->with(compact('articleTypesList'))
                ;
    }

    public function articleSearcher(){
        $modelsList =  BrandModel::lists('name','id')->prepend('(all)','');
        $brandsList = Brand::lists('name','id')->prepend('(all)','');
        $partsList = PartType::lists('name','id')->prepend('(all)','');
        $articles = Article::with('articleType','brand','model','partType')->orderBy('name', 'asc')->get();
        $articleTypeList  = ArticleType::lists('name','id')->prepend('(all)','');


       return view('backoffice.articles.ArticleSearcher')
              ->with(compact('modelsList'))
              ->with(compact('brandsList'))
              ->with(compact('partsList'))
              ->with(compact('articles'))
              ->with(compact('articleTypeList'));
    }

    public function search(){

      $searchKeyword = Request::input('keyword');
      $brand_id =  Request::input('brand_id');
      $brand_model_id =  Request::input('brand_model_id');
      $part_type_id =  Request::input('part_type_id');
      $public =  Request::input('public');
      $article_type_id =  Request::input('article_type_id');


      if($public == 'all'){
          $public = null;
      }

       $articles = Article::
                  where('name','like','%'.$searchKeyword.'%')
                ->where(function ($query) use ($brand_id){
                  if($brand_id != '')
                    $query->where('brand_id', $brand_id);
                })
                ->where(function ($query) use ($brand_model_id){
                  if($brand_model_id != '')
                    $query->where('model_id', $brand_model_id);
                })
                ->where(function ($query) use ($part_type_id){
                  if($part_type_id != '')
                    $query->where('part_type_id', $part_type_id);
                })
                ->where(function ($query) use ($public){
                  if( isset($public))
                    $query->where('public', $public);
                })
                ->where(function ($query) use ($article_type_id){
                  if( $article_type_id != '' )
                    $query->where('article_type_id', $article_type_id);
                })
                  ->with('articleType','brand','model','partType')
                  ->orderBy('name', 'asc')->get();

      $outputView = view('backoffice.articles.partials.articlesTable')->with(compact('articles'))->render();

      return $outputView;
    }

    private function saveArticle(Article $article){
        if($article->model_id == '')
        {
           $article->model_id = null;
        }

        if($article->brand_id== '')
        {
           $article->brand_id = null;
        }

        if($article->part_type_id== '')
        {
           $article->part_type_id = null;
        }

        $article->slug = str_slug($article->name) .'-' .$article->id;


        // this automatically applies the user id for
        //the relations ship
        //TODO: rever isto para associar a peça à loja de que o user é dono;
        $article->save();

        //function inside the Model that self build the code for the article;
        $article->buildCode();
    }

    public function saveImageOrder($articleId , Request $request){
      /*
      * in the data comes 3 values:
      ** image_id: the picture id that was dragged
      ** newIndex: the new index o the dragged image
      ** oldIndex: the old index of that image
      */
      $data = Input::all();

      $newIndex = $data['newIndex'];
      $oldIndex = $data['oldIndex'];
      $image_id = $data['image_id'];

      if($newIndex > $oldIndex){
          $min_index = $oldIndex;
          $max_index =  $newIndex;
          $factor = -1;
      }
      else {
          $min_index =  $newIndex;
          $max_index =  $oldIndex;
          $factor = 1;
      }

      // we update all image orders after to be in the correct order
      $affected = DB::update('update article_images
                              set position=position + ?
                              where article_id = ?
                                  and position >= ?
                                  and position <= ?
                                ',
                               [
                                $factor,
                                $articleId,
                                $min_index,
                                $max_index
                              ]);

      // this updates the dragged image to the current order
      DB::update('update article_images
                  set position=?
                  where article_id = ?
                      and fileentry_id = ?
                    ',
                   [
                    $newIndex,
                    $articleId,
                    $image_id
                  ]);

      // we find the current image with order of the new image
      return \Response::json([
              'error' => false,
              'code'  => 200,
              'feedback' =>'Order changed. '.$affected.' rows afected;'
            ], 200);
    }

    // route for API to get the list of models to feed the combobox
    public function getModelsByBrand(){
        $brand_id = Input::get('brand_id');

        $modelsList =  BrandModel::where('brand_id', $brand_id)->get();

        $html = '<option value="all">(all)</option>';
        foreach ($modelsList as $model) {
          $html = $html.'<option value="'.$model->id.'">'.$model->name.'</option>';
        }

        return $html;
    }

    public function edit($id){
        $modelsList =  BrandModel::orderBy('name', 'asc')->lists('name','id')->prepend('(all)', '');
        $brandsList = Brand::orderBy('name', 'asc')->lists('name','id')->prepend('(all)', '');
        $partsList = PartType::orderBy('name', 'asc')->lists('name','id')->prepend('(all)', '');
         $articleTypesList = ArticleType::orderBy('name', 'asc')->lists('name','id')->prepend('(choose one)','');

        $article = Article::findorFail($id);

        // get the brand pictures
        $articlePictures = $article->pictures()->orderBy('position', 'asc')->get();

        return view('backoffice.articles.edit')
                    ->with(compact('brandsList'))
                    ->with(compact('partsList'))
                    ->with(compact('modelsList'))
                    ->with(compact('article'))
                    ->with(compact('articlePictures'))
                    ->with(compact('articleTypesList'));
    }

    public function store(ArticlesRequest $request){
        // set the shop to the shop of the logged user
        $article = new Article($request->all());

        $this->saveArticle($article);

        $modelsList =  BrandModel::orderBy('name', 'asc')->lists('name','id')->prepend('(all)', '');
        $brandsList = Brand::orderBy('name', 'asc')->lists('name','id')->prepend('(all)', '');
        $partsList = PartType::orderBy('name', 'asc')->lists('name','id')->prepend('(all)', '');
        $articleTypesList = ArticleType::orderBy('name', 'asc')->lists('name','id')->prepend('(choose one)','');

        // get the brand pictures
        $articlePictures = $article->pictures()->get();

        alert()->success('Podes agora adicionar as fotografias relativas ao artigo...' , $article->name.' criado com sucesso!');

        return view('backoffice.articles.edit')
                    ->with(compact('brandsList'))
                    ->with(compact('partsList'))
                    ->with(compact('modelsList'))
                    ->with(compact('article'))
                    ->with(compact('articlePictures'))
                    ->with(compact('articleTypesList'));
    }


    public function loadImages($id){

        $article = Article::findorFail($id);

        // get the article pictures
        $articlePictures = $article->pictures()->orderBy('position', 'asc')->get();

        return view('backoffice.articles.articlePictures')
                    ->with(compact('article'))
                    ->with(compact('articlePictures'));
    }

    public function update($id,ArticlesRequest $request){

        $article = Article::findOrFail($id);

        $article_new = new Article($request->all());

        $article->name = $article_new->name;
        $article->description = $article_new->description;
        $article->price = $article_new->price ;
        $article->reference = $article_new->reference;
        $article->brand_id= $article_new->brand_id;
        $article->model_id= $article_new->model_id;
        $article->public = $article_new->public;
        $article->article_type_id = $article_new->article_type_id;

        $this->saveArticle($article);

        alert()->success($article->name.' actualizado com sucesso');

        return redirect('articles');
    }

    public function markArticleAsSold(){
        $article_id = Input::get('article');

        $article = Article::findOrFail($article_id);

        $article->sell();

        return \Response::json([
                'error' => false,
                'code'  => 200,
                'feedback' =>'Article marked as Sold.'
                ], 200);
    }

    public function addPicture($article_id) {
         $file = Request::file('file');

         $extension = $file->getClientOriginalExtension();

         $path = 'article/'.$article_id.'/';

         $filename = $file->getFilename().'.'.$extension;
         $thumb_filename = $file->getFilename().'_thumb.'.$extension;

         $fileStorage = new FileStorageController();

         $fileStorage->saveImage($path, $filename, $file);
         $fileStorage->saveThumbnail($path, $thumb_filename, $file, 320, 150);

         $entry = new Fileentry();
         $entry->mime = $file->getClientMimeType();
         $entry->original_filename = $file->getClientOriginalName();
         $entry->filename = $file->getFilename().'.'.$extension;
         $entry->path = $path.$filename;
         $entry->thumbnail_path = $path.$thumb_filename;

         $entry->save();

         // now the image is saved
         //now we need to attach this image to our brand;

         $article_image = new ArticleImage();
         $article_image->article_id = $article_id;
         $article_image->fileentry_id = $entry->id;

         $article_image->save();

         // Because this will be called via Ajax by DropZone
         // The response must be in JSON
         // - this is a 200 OK success
         return \Response::json([
                            'error' => 'File could not be saved!',
                            'code'  => 200
                        ], 200);
    }

   public function destroyPicture($picture_id, $article_id){

        $article = Article::findOrFail($article_id);

        //then we get the picture
        $picture = Fileentry::findOrFail($picture_id);

        //deletes the relationship of the file that is being deleted.
        $article->pictures()->detach($picture_id);

        $fs = new FileStorageController();

        $fs->deleteImage($picture->path);

         // then we delete the record in the database
        $picture->delete();

        return \Response::json([
                'error' => false,
                'code'  => 200,
                'feedback' =>'Article picture removed.'
                ], 200);
    }

    public function starPicture($picture_id, $article_id){
        //then we get the picture
        $picture = Fileentry::findOrFail($picture_id);

        $picture->is_starred = !$picture->is_starred;

        $picture->save();

        return \Response::json([
                'error' => false,
                'is_starred' => $picture->is_starred,
                'code'  => 200,
                'feedback' =>'Image has been starred'
                ], 200);
    }

    public function destroy($id) {
        $article = Article::findOrFail($id);

        $article->delete();

        return \Response::json([
                           'error' => false,
                           'code'  => 200,
                           'feedback' =>'O artigo '.$article->name.' foi apagado.'
                       ], 200);
    }


}
