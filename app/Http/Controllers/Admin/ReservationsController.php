<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationsController extends Controller
{
    public function index()
    {
        $users = User::where('usertype', 'User')->get();

        return view('admin.reservations.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('admin.reservations.show', compact('user'));
    }
}
