<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Videoke;
use App\Payment;

class PricingController extends Controller
{
    public function index()
    {
        $videokes = Videoke::all();
        
        return view('pages.pricing.index', compact('videokes'));
    }

    public function show(Videoke $videoke)
    {
        $users = User::all();

        $videokes = Videoke::all();

        $payments = Payment::all();

        return view('pages.pricing.show', compact('videoke', 'payments', 'users', 'videokes'));
    }
}
