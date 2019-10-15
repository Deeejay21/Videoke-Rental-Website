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

        $usersNotification = User::where('usertype', 'User')->where('is_paid', 'Half Payment')->where('is_return', 'Operating')->get();

        $currentTime = $this->currentTime();

        $whereHalf = User::where([['usertype', 'User'], ['is_paid', 'Half Payment'], ['is_return', 'Operating']])->get();

        $wherePaid = User::where([['usertype', 'User'], ['is_paid', 'Paid'], ['is_return', 'Operating']])->get();

        return view('courier.notification.index', compact('user', 'wherePaid', 'whereHalf', 'usersNotification', 'currentTime', 'usersReturn', 'usersDelivery', 'usersAnotherReturn', 'usersAnotherDelivery'));
    }

    public function show(User $user)
    {
        return view('courier.notification.show', compact('user'));
    }

    public function receipt(User $user)
    {
        // $anotherReceipt = User::with('another_reservation')
        //     ->join('another_reservations', 'another_reservations.user_id', '=', 'users.id')
        //     ->select('another_reservations.*', 'users.id', 'users.first_name', 'users.last_name', 'users.gender', 'users.age', 'users.email', 'users.phone')
        //     ->get();

        // foreach ($user->another_reservation as $receipt) {
        //     $receipt;
        // }

        $receipt = $user->another_reservation->where('is_paid', 'Half Payment');

        return view('courier.notification.shows', compact('receipt', 'user'));
    }
}
