<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
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

    public function getImage(string $path) {
        $file = new File();

        return $file;
    }
}

