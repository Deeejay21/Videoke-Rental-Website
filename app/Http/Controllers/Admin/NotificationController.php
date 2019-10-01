<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class NotificationController extends Controller
{
    // public function delivery()
    // {
    //     $usersDelivery = User::where([['usertype', 'User'], ['is_paid', 'Half Payment']])->get();

    //     $usersReturn = User::where([['usertype', 'User'], ['is_paid', 'Paid']])->get();

    //     $currentTime = Carbon::now('asia/manila')->addDays(9);

    //     return view('admin.notification.delivery', compact('currentTime', 'usersDelivery', 'usersReturn'));
    // }

    // public function return()
    // {
    //     $usersReturn = User::where([['usertype', 'User'], ['is_paid', 'Paid']])->get();

    //     $usersDelivery = User::where([['usertype', 'User'], ['is_paid', 'Half Payment']])->get();
        
    //     $currentTime = Carbon::now('asia/manila')->addDays(10);

    //     return view('admin.notification.return', compact('currentTime', 'usersReturn', 'usersDelivery'));
    // }
    public function index()
    {
        $usersReturn = User::where([['usertype', 'User'], ['is_paid', 'Paid']])->get();

        $usersDelivery = User::where([['usertype', 'User'], ['is_paid', 'Half Payment']])->get();

        $usersNotification = User::where('usertype', 'User')->get();

        $currentTime = $this->currentTime();

        return view('admin.notification.index', compact('currentTime', 'usersNotification', 'usersReturn', 'usersDelivery'));
    }
}
