<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Auth;
use Socialite;
use Alert;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Registration & Login Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles the registration of new users, as well as the
  | authentication of existing users. By default, this controller uses
  | a simple trait to add these behaviors. Why don't you explore it?
  |
  */

  use AuthenticatesAndRegistersUsers, ThrottlesLogins;

  /**
  * Where to redirect users after login / registration.
  *
  * @var string
  */
  protected $redirectTo = '/backoffice';

  /**
  * Create a new authentication controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('guest', ['except' => ['logout','getLogout']]);
  }

  /**
  * Get a validator for an incoming registration request.
  *
  * @param  array  $data
  * @return \Illuminate\Contracts\Validation\Validator
  */
  protected function validator(array $data)
  {
    return Validator::make($data, [
      'name' => 'required|max:255',
      'email' => 'required|email|max:255|unique:users',
      'password' => 'required|confirmed|min:6',
    ]);
  }

  /**
  * Create a new user instance after a valid registration.
  *
  * @param  array  $data
  * @return User
  */
  protected function create(array $data)
  {
    return User::create([
      'name' => $data['name'],
      'email' => $data['email'],
      'password' => bcrypt($data['password']),
    ]);
  }

  public function getLogout()
  {
    Auth::logout();
    return redirect('/backoffice');
  }

  public function redirectToFacebook()
  {
    return Socialite::with('facebook')->redirect();
  }

  public function getFacebookCallback()
  {
    $data = Socialite::with('facebook')->user();
    $user = User::where('email', $data->email)->first();

    if(!is_null($user)) {
      Auth::login($user);
      $user->name = $data->user['name'];
      $user->facebook_id = $data->id;

      $user->save();
    } else {
      $user = User::where('facebook_id', $data->id)->first();
      if(is_null($user)){
        // Create a new user
        $user = new User();
        $user->name = $data->user['name'];
        $user->email = $data->email;
        $user->facebook_id = $data->id;
        $user->save();
      }

      Auth::login($user);
    }


    alert()->success('Successfully logged in!', 'Olá, Bem vindo ao sistema de Backoffice do PcQar!');

    return redirect('/backoffice');
  }

  public function postLogin(Request $request)
  {

    $validator = Validator::make($request->all(), [
      'email' => 'required|email',
      'password' => 'required',
    ]);

    if ($validator->fails()) {
      $message = ['errors' => $validator->messages()->all()];
      $response = \Response::json($message, 202);
    } else {
      $remember = $request->remember? true : false;

      if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
        $message = ['success' => 'Love to see you here!', 'url' => '/backoffice'];
        $response = \Response::json($message, 200);
      } else {
        $message = ['errors' => 'Please check your email or password again.'];
        $response = \Response::json($message, 202);
      }
    }

    return $response;
  }


  public function getSocialRedirect( $provider )
  {
      return Socialite::driver( $provider )->redirect();
  }
  public function getSocialHandle( $provider )
  {
    $user = Socialite::with( $provider )->user();
    $socialUser = null;

    //Check is this email present
    $userCheck = User::where('email', '=', $user->email)->first();
    if(!empty($userCheck))
    {
      $socialUser = $userCheck;
    }
    else
    {
      $sameSocialId = Social::where('social_id', '=', $user->id)->where('provider', '=', $provider )->first();
      if(empty($sameSocialId))
      {
        //There is no combination of this social id and provider, so create new one
        $newSocialUser = new User;
        $newSocialUser->email              = $user->email;
        $name = explode(' ', $user->name);
        $newSocialUser->first_name         = $name[0];
        $newSocialUser->last_name          = $name[1];
        $newSocialUser->save();
        $socialData = new Social;
        $socialData->social_id = $user->id;
        $socialData->provider= $provider;
        $newSocialUser->social()->save($socialData);
        // Add role
        $role = Role::whereName('user')->first();
        $newSocialUser->assignRole($role);
        $socialUser = $newSocialUser;
      }
      else
      {
        //Load this existing social user
        $socialUser = $sameSocialId->user;
      }
    }
    $this->auth->login($socialUser, true);
    if( $this->auth->user()->hasRole('user'))
    {
      return redirect()->route('/');
    }
    if( $this->auth->user()->hasRole('administrator'))
    {
      return redirect()->route('/backoffice');
    }
    return \App::abort(500);
  }
}
