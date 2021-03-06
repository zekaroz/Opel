<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class FileStorageController extends Controller
{
    public function __construct() {

    }

    public function saveImage($path, $filename, $file) {

        $image = File::get($file);

        $fullpath = $path.$filename;

        Storage::disk('local')->put($fullpath, $image );

        return $fullpath;
    }

    public function saveThumbnail($path, $filename,  $file,  $width,  $height) {
        $fullpath = $path.$filename;
        // create an image
        $image = Image::make($file->getRealPath())->fit($width, $height);

        Storage::disk('local')->put($fullpath, $image->stream() );

        return $fullpath;
    }

    private function buildImagePath($image_path){
      $full_imagepath = str_replace('\\','/', public_path('images/'.$image_path));

      return $full_imagepath;
    }

    public function getImage($path) {
      // orientate only works when Image::make uses the actual file path to the pic
        $image = Image::make($this->buildImagePath($path))->orientate()->stream();
        return $image;
    }

    public function deleteImage( $path) {
        $exists = Storage::disk('local')->has($path);

        if($exists){
            Storage::disk('local')->delete($path);
        }

        return true;
    }


}
