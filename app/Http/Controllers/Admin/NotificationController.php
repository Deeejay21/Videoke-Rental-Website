<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class NotificationController extends Controller
{
    public function index()
    {
        $usersReturn = User::where([['usertype', 'User'], ['is_paid', 'Paid'], ['is_return', 'Operating']])->get();

        $usersDelivery = User::where([['usertype', 'User'], ['is_paid', 'Half Payment'], ['is_return', 'Operating']])->get();

        $usersNotification = User::where('usertype', 'User')->get();

        $currentTime = $this->currentTime();

        return view('admin.notification.index', compact('currentTime', 'usersNotification', 'usersReturn', 'usersDelivery'));
    }
}
