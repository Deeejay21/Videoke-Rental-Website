<?php

namespace App\Http\Controllers;

use App\User;
use App\Videoke;
use App\Payment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AnotherReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['reservation']);
    }

    public function create(User $user)
    {
        $videokes = Videoke::all();
        $payments = Payment::all();
    
        $qr = Str::random(50);

        return view('users.another-reservation.create', compact('payments', 'videokes', 'user', 'qr'));
    }

    public function store()
    {
        $data = request()->validate([
            'videoke_id' => 'required|not_in:0',
            'reserved_at' => 'required',
            'qr_password' => '',
            'payment_id' => 'required|not_in:0',
        ], [
            'videoke_id.not_in' => 'The videoke field is required.',
            'payment_id.not_in' => 'The payment field is required.',
            'reserved_at.required' => 'The reservation date field is required.',
        ]);

        // $return = request()->validate([
        //     'is_return' => ''
        // ]);
        
        auth()->user()->another_reservation()->create($data);
        // auth()->user()->another_return()->create($return);

        return redirect('/user/' . auth()->user()->id . '/account/home')->with('success', 'Hahaha');
    }
}
