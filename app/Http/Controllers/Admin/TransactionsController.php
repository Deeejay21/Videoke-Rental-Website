<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Payment;
use App\AnotherReservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionsController extends Controller
{
    public function index(User $user)
    {
        $transactions = User::where('usertype', 'User')->whereIn('is_paid', ['Half Payment', 'Paid'])->get();

        $anotherTransaction = AnotherReservation::whereIn('is_paid', ['Half Payment', 'Paid'])->get();

        return view('admin.transaction.index', compact(
            'anotherTransaction', 
            'transactions',
            'user', 
        ));
    }

    public function palawanExpress(User $user)
    {
        $transactions = User::where('usertype', 'User')->whereIn('is_paid', ['Half Payment', 'Paid'])->get();

        $anotherPalawan = AnotherReservation::whereIn('is_paid', ['Half Payment', 'Paid'])->get();

        return view('admin.transaction.palawan-express', compact(
            'anotherPalawan', 
            'transactions',
            'user', 
        ));
    }

    public function smartPadala(User $user)
    {
        $transactions = User::where('usertype', 'User')->whereIn('is_paid', ['Half Payment', 'Paid'])->get();

        $anotherSmart = AnotherReservation::whereIn('is_paid', ['Half Payment', 'Paid'])->get();

        return view('admin.transaction.smart-padala', compact(
            'anotherSmart', 
            'transactions',
            'user', 
        ));
    }
    
    public function bayadCenter(User $user)
    {
        $transactions = User::where('usertype', 'User')->whereIn('is_paid', ['Half Payment', 'Paid'])->get();

        $anotherBayad = AnotherReservation::whereIn('is_paid', ['Half Payment', 'Paid'])->get();

        return view('admin.transaction.bayad-center', compact(
            'anotherBayad', 
            'transactions',
            'user', 
        ));
    }
}
