<?php

namespace App\Http\Controllers;

use App\User;
use App\AnotherReservation;

class QRErrorController extends Controller
{
    public function index(User $user)
    {
        return view('pages.qrerror', compact('user'));
    }
}
