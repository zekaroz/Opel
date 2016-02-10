<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests\ArticlesRequest;
use App\Http\Controllers\Controller;
use App\Article;
use App\Brand;
use App\PartType;
use App\BrandModel;
use App\ArticleImage;
use Illuminate\Support\Facades\Response;
use Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Fileentry;

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
               
         $articles = Article::orderBy('name', 'asc')->get();
         
         return view('backoffice.articles.index', compact('articles'));
    }
    
    public function show($id){
        $article = Article::findorFail($id);
        
        return view('backoffice.articles.show', compact('article'));
    }
    
    public function create(){
        $ $modelsList =  BrandModel::lists('name','id')->prepend('(all)','');
        $brandsList = Brand::lists('name','id')->prepend('(all)','');
        $partsList = PartType::lists('name','id')->prepend('(all)','');
        
        return view('backoffice.articles.create' )
                    ->with(compact('brandsList'))
                    ->with(compact('partsList'))
                    ->with(compact('modelsList'));
    }
    
    public function store(ArticlesRequest $request){       
        // set the shop to the shop of the logged user
        $article = new Article($request->all());
        
        $article->shop_id = Auth::user()->shops()->first()->id;
        
        $article->article_type_id = \App\ArticleType::first()->id;
        
        $article->model_id = null; 
        // this automatically applies the user id for
        //the relations ship
        //TODO: rever isto para associar a peça à loja de que o user é dono;
        $article->save();
        
        flash()->success('Article has been created.');
        
        return redirect('articles');
    }
    
    public function edit($id){
        $modelsList =  BrandModel::lists('name','id')->prepend('(all)', '');
        $brandsList = Brand::lists('name','id')->prepend('(all)', '');
        $partsList = PartType::lists('name','id')->prepend('(all)', '');
        
        $article = Article::findorFail($id);

        // get the brand pictures
        $articlePictures = $article->pictures()->get();
        
        return view('backoffice.articles.edit')
                    ->with(compact('brandsList'))
                    ->with(compact('partsList'))
                    ->with(compact('modelsList'))
                    ->with(compact('article'))
                    ->with(compact('articlePictures'));
    }
    
    public function update($id,ArticlesRequest $request){
        
        $article = Article::findOrFail($id);
        
        $article->model_id =  BrandModel::first()->id; 
        
        
        $article->update($request->all());
        
         flash()->success('Article has been updated.');
         
         return redirect('articles');           
    }
       
    public function addPicture($article_id) {
         $file = Request::file('file');
         
         $extension = $file->getClientOriginalExtension();
         
         $finalpath = 'article/'.$article_id.'/'.$file->getFilename().'.'.$extension;
         
         Storage::disk('local')->put($finalpath,  File::get($file));

         $entry = new Fileentry();
         $entry->mime = $file->getClientMimeType();
         $entry->original_filename = $file->getClientOriginalName();
         $entry->filename = $file->getFilename().'.'.$extension;
         $entry->path = $finalpath;

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
                            'error' => false,
                            'code'  => 200
                        ], 200);
    }
    
}
