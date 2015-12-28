<?php

namespace App\Http\Controllers;

use Request;

use App\Shop;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ShopsController extends Controller
{
    //
    public function index(){
               
         $shops = Shop::latest('created_at')->get();
         
         return view('shops.index', compact('shops'));
    }
    
    public function show($id){
        
        $shop = Shop::findorFail($id);

        return view('shops.show', compact('shop'));
    }
    
    public function create(){
        
        return view('shops.create');
    }
    
    public function store(){
        $input = Request::all();
         
        Shop::create($input);
        
        return redirect('Shops');
    }
}
