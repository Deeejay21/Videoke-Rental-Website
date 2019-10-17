<?php

namespace App\Http\Controllers\Courier;

use App\User;
use App\Videoke;
use App\Payment;
use App\AnotherReservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index(User $user)
    {
        $users = User::where([['usertype', 'User'], ['is_return', 'Operating']])->whereIn('is_paid', ['Half Payment', 'Paid'])->get();

        $anotherReservation = User::with('another_reservation')
            ->join('another_reservations', 'another_reservations.user_id', '=', 'users.id')
            ->select('another_reservations.*', 'users.id', 'users.usertype', 'users.first_name', 'users.last_name', 'users.gender', 'users.age', 'users.phone', 'users.email')
            ->where('another_reservations.is_return', 'Operating')
            ->whereIn('another_reservations.is_paid', ['Paid', 'Half Payment'])
            ->where('users.usertype', 'User')
            ->get();

        return view('courier.customers.index', compact(
            'anotherReservation',
            'users', 
            'user', 
        ));
    }
}
