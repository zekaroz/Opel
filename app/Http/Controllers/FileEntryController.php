<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Fileentry;
use Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use App\Http\Controllers\FileStorageController;

class FileEntryController extends Controller
{

        public function __construct() {

        }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$entries = Fileentry::all();

		return view('fileentries.index', compact('entries'));
	}

	public function add() {
    $file = Request::file('file');
		$extension = $file->getClientOriginalExtension();

    Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));

    $entry = new Fileentry();
		$entry->mime = $file->getClientMimeType();
		$entry->original_filename = $file->getClientOriginalName();
		$entry->filename = $file->getFilename().'.'.$extension;
    $entry->path = $file->getFilename().'.'.$extension;

    $entry->save();
		return redirect('fileentry');
	}

  public function getImage($imageid){
		$entry = Fileentry::where('id', '=', $imageid)->firstOrFail();
    $fs = new FileStorageController();
    $file = $fs->getImage($entry->path);

    // return the image to the page, just a binary
    return (new Response($file, 200))
                    ->header('Content-Type', $entry->mime);
	}

	public function get($filename){
		$entry = Fileentry::where('filename', '=', $filename)->firstOrFail();
    $fs = new FileStorageController();
    $file = $fs->getImage($entry->path);
		return (new Response($file, 200))
                    ->header('Content-Type', $entry->mime);
	}

  public function getThumbnail($filename){
		$entry = Fileentry::where('filename', '=', $filename)->firstOrFail();
    $fs = new FileStorageController();
    $file = $fs->getImage($entry->thumbnail_path);

    return (new Response($file, 200))
                  ->header('Content-Type', $entry->mime);
	}

    public function destroy($file_id) {

        $file = Fileentry::findOrFail($file_id);

        $file->delete();

        return \Response::json([
                           'error' => false,
                           'code'  => 200,
                           'feedback' =>'Model has been deleted.'
                       ], 200);
    }
}
