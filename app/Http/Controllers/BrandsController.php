<?php

namespace App\Http\Controllers;
use App\Brand;
use App\BrandModel;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Fileentry;
use App\BrandImage;

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
        
        // get the brand pictures
        $brandPictures = $brand->pictures()->get();

        return view('backoffice.brands.edit')
               ->with(compact('brand'))
               ->with(compact('brandModels'))
               ->with(compact('brandPictures'));
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
    
    public function addPicture($brand_id) {
         $file = Request::file('file');
         
         $extension = $file->getClientOriginalExtension();
         
         $finalpath = 'brands/'.$file->getFilename().'.'.$extension;
         
         Storage::disk('local')->put($finalpath,  File::get($file));

         $entry = new Fileentry();
         $entry->mime = $file->getClientMimeType();
         $entry->original_filename = $file->getClientOriginalName();
         $entry->filename = $file->getFilename().'.'.$extension;
         $entry->path = $finalpath;

         $entry->save();
         
         // now the image is saved
         
         //now we need to attach this image to our brand;
         
         $brand_image = new BrandImage();
         $brand_image->brand_id = $brand_id;
         $brand_image->fileentry_id = $entry->id;

         $brand_image->save();
         
         // Because this will be called via Ajax by DropZone
         // The response must be in JSON 
         // - this is a 200 OK success
         return Response::json([
                            'error' => false,
                            'code'  => 200
                        ], 200);
    }
}
