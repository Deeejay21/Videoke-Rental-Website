<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationsController extends Controller
{
    public function index()
    {
        // $users = User::first();
        // $checked_in_at = $users->checked_in_at;
        // $date_return = $users->videoke->number;

        // $date = date_create($checked_in_at);

        // date_add($date,date_interval_create_from_date_string($date_return));
        // echo date_format($date,"F d, Y g:i A");
        $currentTime = $this->currentTime();

        $usersNotification = User::where('usertype', 'User')->get();

        $users = User::where('usertype', 'User')->get();

        return view('admin.reservations.index', compact('users', 'currentTime', 'usersNotification'));
    }

    public function show(User $user)
    {
        $currentTime = $this->currentTime();

        $usersNotification = User::where('usertype', 'User')->get();
        
        return view('admin.reservations.show', compact('user', 'currentTime', 'usersNotification'));
    }
}
