<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';
    protected function redirectTo()
    {
        if(auth()->user()->usertype == 'Admin')
        {
            return '/admin';
        }
        elseif (auth()->user()->usertype == 'Courier')
        {
            return '/courier';
        }
        else
        {
            return '/user/' . auth()->user()->id . '/account/home';
        }

        // if (auth()->user()->status == '0')
        // {
        //     return '/user/' . auth()->user()->id . '/account/home';
        // }
        // else
        // {
        //     return '/user/' . auth()->user()->id . '/account/home';
        // }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function credentials(Request $request)
    {
        // return $request->only($this->username(), 'password');
        return ['email'=>$request->{$this->username()},'password'=>$request->password,'is_expired'=> 'Active'];
    }
}
