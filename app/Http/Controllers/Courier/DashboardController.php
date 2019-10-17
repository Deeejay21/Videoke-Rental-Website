<?php

namespace App\Http\Controllers\Courier;

use App\User;
use App\Payment;
use App\VideokeTotal;
use App\AnotherReservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(User $user)
    {
        return view('courier.dashboard.index', compact('user'));
    }
}
