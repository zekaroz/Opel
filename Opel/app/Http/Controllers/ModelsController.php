<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Brand;
use App\Model;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ModelsController extends Controller
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
    
    public function store(Requests\Model $request){       

        $model = new Model([
            'name'=>$request->get('name'), 
            'code'=>$request->get('code'),
            'brand_id'=>$request->get('brand_id')
        ]);
                
        // this automatically applies the user id for
        //the relations ship
        $model->save();
        
        
        
        // go back to edit page
        return redirect('brands/'.$model->brand_id.'/edit')
                            ->with([
                                'message'=>'Model successfully added.',
                                'success'=>true
                            ]);
    }
    
    public function edit($id){
    // no view defined for this
    }
    
    public function update($id,Requests\BrandRequest $request){
        
        $brand = Brand::findOrFail($id);
        
        $brand->update([
            'name'=>$request->get('name'), 
            'code'=>$request->get('code')
        ]);
    
        $imputFileName = 'image';
        $imagesFolder = '/public/images/brands';
        
        dd($request->file($imputFileName));
            
        
        if( ! is_null($request->file($imputFileName)))
        {
            dd($request->file($imputFileName));
            
            $imagename = $brand->id . '.' .
                    $request->file($imputFileName)
                            ->getClientOriginalExtension();

            $destinationPath = base_path() . $imagesFolder ;

            if(file_exists($destinationPath)){
                file($destinationPath).unlink();
            }
            
            $request->file($imputFileName)
                    ->move($destinationPath, $imagename);

            $brand->update([
                'imagePath', $destinationPath
            ]);       
        }  
        
         return redirect('brands');           
    }
    
    public function destroy($id,Requests\Model $request) {
        
        $model = Model::findOrFail($id);
        
        $model->delete();
        
        return redirect('brands/'.$model->brand_id.'/edit')
                            ->with([
                                'message'=>'Model successfully deleted.',
                                'success'=>true
                            ]);
    }
}
