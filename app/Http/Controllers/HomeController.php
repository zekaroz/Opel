<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Article;
use App\PartType;
use App\Brand;
use App\BrandModel;
use App\SiteContact;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $articleCount = Article::all()->count()  ;
        $partTypeCount = PartType::all()->count();
        $brandsCount = Brand::all()->count();
        $modelCount = BrandModel::all()->count();

        $contactList = SiteContact::all();

       // dd($articleCount);

        return view('home')
            ->with( ['articleCount' => $articleCount
                    , 'partTypeCount' => $partTypeCount
                    , 'brandsCount' => $brandsCount
                    , 'modelCount' => $modelCount
                    , 'contactList' => $contactList
                  ]);
    }
}
