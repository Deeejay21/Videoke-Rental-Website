<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function home(User $user)
    {
        return view('users.accounts.home', compact('user'));
    }

    public function personalinformation(User $user)
    {
        //    $this->authorize('viewAny', User::class);

        return view('users.accounts.personalinformation', compact('user'));
    }

    public function reservation(User $user)
    {
        return view('users.accounts.reservation', compact('user'));
    }

    public function payment(User $user)
    {
        return view('users.accounts.payment', compact('user'));
    }

    public function preview(User $user)
    {
        return view('users.accounts.preview', compact('user'));
    }
}
