<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ArticleType;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticleTypesController extends Controller
{
    
         
    public function __construct() {
       $this->middleware('auth');
    }
    
    //
    public function index(){
               
         $articleTypes = ArticleType::orderBy('name', 'asc')->get();
         
         return view('backoffice.articletypes.index', compact('articleTypes'));
    }
    
    public function show($id){
        $articleType = ArticleType::findorFail($id);
        
        return view('backoffice.articletypes.show', compact('articleType'));
    }
    
    public function create(){
        
        return view('backoffice.articletypes.create');
    }
    
    public function store(Requests\ArticleTypeRequest $request){       
               
        $articleType = new ArticleType($request->all());
        
        // this automatically applies the user id for
        //the relations ship
        //TODO: rever isto para associar a peça à loja de que o user é dono;
        $articleType->save();
        
        return redirect('article_types');
    }
    
    public function edit($id){
        
        $articleType = ArticleType::findorFail($id);
        
        return view('backoffice.articletypes.edit', compact('articleType'));
    }
    
    public function update($id,Requests\ArticleTypeRequest $request){
        
        $articleType = ArticleType::findOrFail($id);
        
        $articleType->update($request->all());
        
         return redirect('article_types');           
    }
    //
}
