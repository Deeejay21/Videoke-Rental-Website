<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    public function delivery()
    {
        $users = User::all();
        $currentTime = Carbon::now('asia/manila');
        $currentTime = date('F d, Y');

        return view('admin.notification.delivery', compact('users', 'currentTime'));
    }

    public function return()
    {
        $users = User::all();
        $currentTime = Carbon::now('asia/manila');
        $currentTime = date('F d, Y');

        return view('admin.notification.return', compact('users', 'currentTime'));
    }
}
