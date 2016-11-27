<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticlesRequest;
use App\Http\Controllers\Controller;
use App\Article;
use App\ArticleType;
use App\Brand;
use App\PartType;
use App\BrandModel;
use App\ArticleImage;
use Illuminate\Support\Facades\Response;
use Request;
use Illuminate\Support\Facades\File;
use App\Fileentry;
use Illuminate\Support\Facades\DB;

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

       $modelsList =  BrandModel::lists('name','id')->prepend('(all)','');
       $brandsList = Brand::lists('name','id')->prepend('(all)','');
       $partsList = PartType::lists('name','id')->prepend('(all)','');
       $articles = Article::with('articleType','brand','model','partType')->orderBy('name', 'asc')->get();
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
        $modelsList =  BrandModel::lists('name','id')->prepend('(all)','');
        $brandsList = Brand::lists('name','id')->prepend('(all)','');
        $partsList = PartType::lists('name','id')->prepend('(all)','');
        $articleTypesList = ArticleType::lists('name','id')->prepend('(choose one)','');

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
    }

    public function edit($id){
        $modelsList =  BrandModel::lists('name','id')->prepend('(all)', '');
        $brandsList = Brand::lists('name','id')->prepend('(all)', '');
        $partsList = PartType::lists('name','id')->prepend('(all)', '');
         $articleTypesList = ArticleType::lists('name','id')->prepend('(choose one)','');

        $article = Article::findorFail($id);

        // get the brand pictures
        $articlePictures = $article->pictures()->get();

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

        flash()->success('Article has been created. You can now enter the Pictures!');

        $modelsList =  BrandModel::lists('name','id')->prepend('(all)', '');
        $brandsList = Brand::lists('name','id')->prepend('(all)', '');
        $partsList = PartType::lists('name','id')->prepend('(all)', '');
        $articleTypesList = ArticleType::lists('name','id')->prepend('(choose one)','');

        // get the brand pictures
        $articlePictures = $article->pictures()->get();

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

        // get the brand pictures
        $articlePictures = $article->pictures()->get();

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

        flash()->success('Article has been updated.');

        return redirect('articles');
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
         return Response::json([
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
                'feedback' =>'Brand picture removed.'
                ], 200);
    }

    public function destroy($id) {
        $article = Article::findOrFail($id);

        $article->delete();

        return \Response::json([
                           'error' => false,
                           'code'  => 200,
                           'feedback' =>'Article has been deleted.'
                       ], 200);
    }
}
