<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;

class NavbarController extends Controller
{
    public function navbar()
    {
        // $usersReturn = User::where([['usertype', 'User'], ['is_paid', 'Paid']])->get();

        // $usersDelivery = User::where([['usertype', 'User'], ['is_paid', 'Half Payment']])->get();
        
        // $currentTime = Carbon::now('asia/manila')->addDays(10);

        // return view('admin.notification.return', compact('currentTime', 'usersReturn', 'usersDelivery'));
    }
}
