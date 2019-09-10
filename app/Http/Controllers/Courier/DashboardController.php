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
        $users = User::all();
        $total_customers = $user->total_customers();
        $total_payments = Payment::count();
        $total_videokes = VideokeTotal::count();

        return view('courier.dashboard.index', compact('users', 'total_customers', 'total_payments', 'total_videokes'));
    }
}
