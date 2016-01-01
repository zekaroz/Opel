<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Brand;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BrandsController extends Controller
{
    public function __construct() {
       $this->middleware('auth');
    }
    
    //
    public function index(){
               
         $brands = Brand::orderBy('name', 'asc')->get();
         
         return view('backoffice.brands.index', compact('brands'));
    }
    
    public function show($id){
        $brand = Brands::findorFail($id);
        
        return view('backoffice.brands.show', compact('brand'));
    }
    
    public function create(){
        
        return view('backoffice.brands.create');
    }
    
    public function store(Requests\BrandRequest $request){       
               
        $brand = new Brand($request->all());
        
        // this automatically applies the user id for
        //the relations ship
        //TODO: rever isto para associar a peça à loja de que o user é dono;
        $brand->save();
        
        return redirect('brands');
    }
    
    public function edit($id){
        
        $brand = Brand::findorFail($id);
        
        return view('backoffice.brands.edit', compact('brand'));
    }
    
    public function update($id,Requests\BrandRequest $request){
        
        $brand = Brand::findOrFail($id);
        
        $brand->update($request->all());
        
         return redirect('brands');           
    }
}
