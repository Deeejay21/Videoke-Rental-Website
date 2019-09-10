<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    public function index()
    {
        $users = User::all();
        $currentTime = Carbon::now('asia/manila');
        $currentTime = date('F d, Y');

        return view('admin.notification.index', compact('users', 'currentTime'));
    }
}
