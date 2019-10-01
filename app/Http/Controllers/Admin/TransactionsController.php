<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionsController extends Controller
{
    public function index()
    {
        $currentTime = $this->currentTime();

        $usersNotification = User::where('usertype', 'User')->get();

        $transactions = User::where('usertype', 'User')->where('is_paid', 'Paid')->get();

        return view('admin.transaction.index', compact('currentTime', 'usersNotification', 'transactions'));
    }

    public function palawanExpress()
    {
        $currentTime = $this->currentTime();

        $usersNotification = User::where('usertype', 'User')->get();

        $transactions = User::where('usertype', 'User')->where('is_paid', 'Paid')->get();

        return view('admin.transaction.palawan-express', compact('currentTime', 'usersNotification', 'transactions'));
    }

    public function smartPadala()
    {
        $currentTime = $this->currentTime();

        $usersNotification = User::where('usertype', 'User')->get();

        $transactions = User::where('usertype', 'User')->where('is_paid', 'Paid')->get();

        return view('admin.transaction.smart-padala', compact('currentTime', 'usersNotification', 'transactions'));
    }
    
    public function bayadCenter()
    {
        $currentTime = $this->currentTime();

        $usersNotification = User::where('usertype', 'User')->get();

        $transactions = User::where('usertype', 'User')->where('is_paid', 'Paid')->get();

        return view('admin.transaction.bayad-center', compact('currentTime', 'usersNotification', 'transactions'));
    }
}
