<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DashboardsController extends Controller
{
    //as this is a private controller everything handled by this controller is
    // only to be seen inside the backoffice.
    public function __construct() {

        /*
         *this must be changed
         * we want just to be authenticated on Creation and Update
         * for Show it's public.
         *           */
       $this->middleware('auth');
    }

    public function index(){
        return view('dashboards.index');
    }
}
