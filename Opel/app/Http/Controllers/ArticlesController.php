<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests\ArticlesRequest;
use App\Http\Controllers\Controller;
use App\Article;
use App\Brand;
use App\PartType;
use App\BrandModel;


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
        $modelsList = BrandModel::lists('id','name');
        $brandsList = Brand::lists('name','id');
        $partsList = PartType::lists('name','id');
        
        return view('backoffice.articles.create' )
                    ->with(compact('brandsList'))
                    ->with(compact('partsList'))
                    ->with(compact('$modelsList'));
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
    //    $modelsList = \App\Model::lists('id','name');
        $brandsList = Brand::lists('name','id');
        $partsList = PartType::lists('name','id');
        
        $article = Article::findorFail($id);
        
        return view('backoffice.articles.edit')
                    ->with(compact('brandsList'))
                    ->with(compact('partsList'))
                    ->with(compact('article'));
    }
    
    public function update($id,ArticlesRequest $request){
        
        $article = Article::findOrFail($id);
        
        $article->model_id = null; 
        
        $article->update($request->all());
        
         flash()->success('Article has been updated.');
         
         return redirect('articles');           
    }
    
}
