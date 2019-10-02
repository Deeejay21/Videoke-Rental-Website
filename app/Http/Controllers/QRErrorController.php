<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class QRErrorController extends Controller
{
    public function index(User $user)
    {
        $usersNotification = User::where('usertype', 'User')->get();
        
        $currentTime = $this->currentTime();

        return view('pages.qrerror', compact('usersNotification', 'currentTime', 'user'));
    }
}
