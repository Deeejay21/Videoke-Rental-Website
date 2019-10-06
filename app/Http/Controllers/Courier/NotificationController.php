<?php

namespace App\Http\Controllers\Courier;

use App\User;
use App\AnotherReservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    public function index()
    {
        $usersDelivery = User::where([['usertype', 'User'], ['is_paid', 'Half Payment'], ['is_return', 'Operating']])->get();

        $usersAnotherDelivery = AnotherReservation::where([['is_paid', 'Half Payment'], ['is_return', 'Operating']])->get();

        $usersReturn = User::where([['usertype', 'User'], ['is_paid', 'Paid'], ['is_return', 'Operating']])->get();

        $usersAnotherReturn = AnotherReservation::where([['is_paid', 'Paid'], ['is_return', 'Operating']])->get();

        $usersNotification = User::where('usertype', 'User')->where('is_paid', 'Half Payment')->where('is_return', 'Operating')->get();

        $currentTime = $this->currentTime();

        return view('courier.notification.index', compact('usersNotification', 'currentTime', 'usersReturn', 'usersDelivery', 'usersAnotherReturn', 'usersAnotherDelivery'));
    }
}
