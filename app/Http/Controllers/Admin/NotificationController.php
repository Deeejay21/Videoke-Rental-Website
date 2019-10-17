<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\AnotherReservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class NotificationController extends Controller
{
    public function index()
    {
        $usersDelivery = User::where([['usertype', 'User'], ['is_paid', 'Half Payment'], ['is_return', 'Operating']])->get();

        $usersAnotherDelivery = AnotherReservation::where([['is_paid', 'Half Payment'], ['is_return', 'Operating']])->get();

        $usersReturn = User::where([['usertype', 'User'], ['is_paid', 'Paid'], ['is_return', 'Operating']])->get();

        $usersAnotherReturn = AnotherReservation::where([['is_paid', 'Paid'], ['is_return', 'Operating']])->get();

        return view('admin.notification.index', compact('usersReturn', 'usersAnotherReturn', 'usersAnotherDelivery', 'usersDelivery'));
    }
    
    public function show(User $user)
    {
        return view('admin.notification.show', compact('user'));
    }

    public function receipt(User $user)
    {
        $receipt = $user->another_reservation->where('is_paid', 'Half Payment');

        return view('admin.notification.shows', compact('receipt', 'user'));
    }
}
