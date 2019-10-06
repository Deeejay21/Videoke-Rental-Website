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
        $usersReturn = User::with('videoke_return')
            ->join('videoke_returns', 'videoke_returns.user_id', '=', 'users.id')
            ->select('videoke_returns.*', 'users.*')
            ->where('is_return', 'Operating')
            ->where('users.usertype', 'User')
            ->where('users.is_paid', 'Paid')
            ->get();

        $usersDelivery = User::with('videoke_return')
            ->join('videoke_returns', 'videoke_returns.user_id', '=', 'users.id')
            ->select('videoke_returns.*', 'users.*')
            ->where('is_return', 'Operating')
            ->where('users.usertype', 'User')
            ->where('users.is_paid', 'Half Payment')
            ->get();

        $usersNotification = User::where('usertype', 'User')->get();

        $currentTime = $this->currentTime();

        return view('admin.notification.index', compact('currentTime', 'usersNotification', 'usersReturn', 'usersDelivery'));
    }
}
