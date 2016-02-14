<?php namespace App\Http\Controllers;

use App\User;

class UsersController extends Controller {

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
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
            $users = User::all();
            return view('users')
                    ->with(compact('users'));
	}

}
