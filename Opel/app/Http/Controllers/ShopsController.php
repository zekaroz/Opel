<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Shop;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ShopsController extends Controller
{
    //
    public function index(){
               
         $shops = Shop::All();
         
         return view('shops.index', compact('shops'));
    }
    
    public function show($id){
        
        $shop = Shop::findorFail($id);

        return view('shops.show', compact('shop'));
    }
    
    public function create(){
        
        return view('shops.create');
    }
}
