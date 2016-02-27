<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Brand;
use App\Http\Controllers\Controller;
 
class AjaxController extends Controller
{
        public function listBrandPictures($brandid){
             
            $brand = Brand::findorFail($brandid);
            // get the brand pictures
            $brandPictures = $brand->pictures()->get();

            return view('fileentries.listPictures')
                   ->with(compact('brandPictures'));
        }
}
