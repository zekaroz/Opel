<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
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
