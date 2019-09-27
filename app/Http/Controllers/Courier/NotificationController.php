<?php

namespace App\Http\Controllers\Courier;

use App\User;
use App\VideokeReturn;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    public function index()
    {
        // $users = User::where('is_paid', 'Half Payment');
        $users = User::where('usertype', 'User')->get();
        // $currentTime = Carbon::now('asia/manila');
        $currentTime = Carbon::now('asia/manila')->addDays(2);

        $userReturn = User::where('is_return', 'Operating')->where('usertype', 'User')->get();

        return view('courier.notification.index', compact('users', 'currentTime', 'userReturn'));
    }
}
