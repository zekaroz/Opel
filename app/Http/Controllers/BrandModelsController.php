<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\BrandModel;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BrandModelsController extends Controller
{
    public function __construct() {
       $this->middleware('auth');
    }
    
    //
    public function index(){
               // no index method defined on itself
    }
    
    public function show($id){
               // no index method defined on itself
    }
    
    public function create(){
        
               // no index method defined on itself
        
    }
    
    public function store(Requests\BrandModelRequest $request){       

        $model = new BrandModel([
            'name'=>$request->get('name'), 
            'code'=>$request->get('code'),
            'brand_id'=>$request->get('brand_id')
        ]);
                
        // this automatically applies the user id for
        //the relations ship
        $model->save();
        
        
        flash()->success('Model has been created.');
        
        // go back to edit page
        return redirect('brands/'.$model->brand_id.'/edit');
   }
    
    public function edit($id){
    // no view defined for this
    }
    
    public function update($id,Requests\BrandModelRequest $request){
        
    }
    
    public function destroy($id) {
        $model = BrandModel::findOrFail($id);
        
        $model->delete();
        
        return \Response::json([
                           'error' => false,
                           'code'  => 200, 
                           'feedback' =>'Shop has been deleted.'
                       ], 200);        
    }
    
 
}
