<?php

namespace App\Http\Controllers\Courier;

use App\User;
use App\VideokeReturn;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    public function index()
    {
        $usersDelivery = User::where([['usertype', 'User'], ['is_paid', 'Half Payment']])->get();
        
        $usersReturn = User::where([['usertype', 'User'], ['is_paid', 'Paid']])->get();
        
        $currentTime = $this->currentTime();

        return view('courier.notification.index', compact('currentTime', 'usersReturn', 'usersDelivery'));
    }
}
