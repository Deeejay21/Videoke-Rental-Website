<?php

namespace App\Http\Controllers\Courier;

use App\User;
use App\AnotherReservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    public function index(User $user)
    {
        $usersDelivery = User::where([['usertype', 'User'], ['is_paid', 'Half Payment'], ['is_return', 'Operating']])->get();

        $usersAnotherDelivery = AnotherReservation::where([['is_paid', 'Half Payment'], ['is_return', 'Operating']])->get();

        $usersReturn = User::where([['usertype', 'User'], ['is_paid', 'Paid'], ['is_return', 'Operating']])->get();

        $usersAnotherReturn = AnotherReservation::where([['is_paid', 'Paid'], ['is_return', 'Operating']])->get();

        return view('courier.notification.index', compact(
            'usersAnotherDelivery',
            'usersAnotherReturn', 
            'usersDelivery', 
            'usersReturn', 
        ));
    }

    public function show(User $user)
    {
        return view('courier.notification.show', compact('user'));
    }

    public function receipt(User $user)
    {

        $receipt = $user->another_reservation->where('is_paid', 'Half Payment');

        return view('courier.notification.shows', compact('receipt', 'user'));
    }
}
