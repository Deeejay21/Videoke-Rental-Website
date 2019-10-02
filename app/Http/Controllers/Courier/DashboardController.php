<?php

namespace App\Http\Controllers\Courier;

use App\User;
use App\Payment;
use App\VideokeTotal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(User $user)
    {
        $usersNotification = User::where('usertype', 'User')->get();

        $currentTime = $this->currentTime();

        return view('courier.dashboard.index', compact('usersNotification', 'currentTime', 'user'));
    }
}
