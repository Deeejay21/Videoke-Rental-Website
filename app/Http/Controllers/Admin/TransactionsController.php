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
        $transactions = User::where('usertype', 'User')->where('is_paid', 'Paid')->get();

        return view('admin.transaction.index', compact('transactions'));
    }

    public function palawanExpress()
    {
        $transactions = User::where('usertype', 'User')->where('is_paid', 'Paid')->get();

        return view('admin.transaction.palawan-express', compact('transactions'));
    }

    public function smartPadala()
    {
        $transactions = User::where('usertype', 'User')->where('is_paid', 'Paid')->get();

        return view('admin.transaction.smart-padala', compact('transactions'));
    }
    
    public function bayadCenter()
    {
        $transactions = User::where('usertype', 'User')->where('is_paid', 'Paid')->get();

        return view('admin.transaction.bayad-center', compact('transactions'));
    }
}
