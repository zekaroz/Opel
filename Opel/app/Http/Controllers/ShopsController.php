<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Shop;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ShopsController extends Controller
{
    
    public function __construct() {
       $this->middleware('auth');
    }
    
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
               
        $shop = new Shop($request->all());
        
        // this automatically applies the user id for
        //the relations ship
        Auth::user()->shops()->save($shop );
        
        flash()->success('Part Type has been created.');
        
        return redirect('shops');
    }
    
    public function edit($id){
        
        $shop = Shop::findorFail($id);
        
        return view('shops.edit', compact('shop'));
    }
    
    public function update($id,Requests\ShopRequest $request){
        $shop = Shop::findOrFail($id);
        
        $shop->update($request->all());
        
        flash()->success('Part Type has been updated.');
        
        return redirect('shops');           
    }
}
