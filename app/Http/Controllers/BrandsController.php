<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Brand;
use App\BrandModel;
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

        $brand = new Brand([
            'name'=>$request->get('name'), 
            'code'=>$request->get('code'), 
        ]);
        
        // this automatically applies the user id for
        //the relations ship
        $brand->save();
        
        flash()->success('Brand has been created.');

        return redirect('brands');
    }
    
    public function edit($id){
        
        $brand = Brand::findorFail($id);
        
        $brandModels = BrandModel::where('brand_id','=',$id)->get();

        return view('backoffice.brands.edit')
               ->with(compact('brand'))
               ->with(compact('brandModels'));
    }
    
    public function update($id,Requests\BrandRequest $request){
        
        $brand = Brand::findOrFail($id);
        
        $brand->update([
            'name'=>$request->get('name'), 
            'code'=>$request->get('code')
        ]);
        
        flash()->success('Brand has been updated.');
        
         return redirect('brands');           
    }
}
