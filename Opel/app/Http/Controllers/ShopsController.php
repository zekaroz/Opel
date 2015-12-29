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
               
         $shops = Shop::latest('created_at')->EmailFilled()->get();
         
         return view('shops.index', compact('shops'));
    }
    
    public function show($id){
        
        $shop = Shop::findorFail($id);

        return view('shops.show', compact('shop'));
    }
    
    public function create(){
        
        return view('shops.create');
    }
    
    public function store(Requests\ShopRequest $request){       
               
        Shop::create($request->all());
        
        return redirect('shops');
    }
    
    public function edit($id){
        
        $shop = Shop::findorFail($id);
        
        return view('shops.edit', compact('shop'));
    }
    
    public function update($id,Requests\ShopRequest $request){
        
        $shop = Shop::findOrFail($id);
        
        $shop->update($request->all());
        
         return redirect('shops');           
    }
}
