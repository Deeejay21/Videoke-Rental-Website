<?php

namespace App\Http\Controllers\Courier;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationsController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('courier.reservations.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('courier.reservations.show', compact('user'));
    }
}
