<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QRErrorController extends Controller
{
    public function index(User $user)
    {
        $currentTime = $this->currentTime();

        $usersNotification = User::where('usertype', 'User')->get();

        return view('pages.qrerror', compact('user', 'currentTime', 'usersNotification'));
    }
}
