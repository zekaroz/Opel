<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use App\ArticleType;

class OnlineShopController extends Controller
{
    
    public function __construct() {
        
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function partSearch(){
        
        $article_type_car = ArticleType::where('code', 'P')->get()->first();
              
        $articles = Article::all()
                    ->where('article_type_id', $article_type_car->id) ;
        return view('online_shop.partsSearch.partSearch')
                    ->with(compact('articles'));
    }
    
        
    public function carSearch(){
        
        $article_type_car = ArticleType::where('code', 'C')->get()->first();
              
        $articles = Article::all()
                    ->where('article_type_id', $article_type_car->id) ;
        
        return view('online_shop.partsSearch.partSearch')
                    ->with(compact('articles'));
    }
}
