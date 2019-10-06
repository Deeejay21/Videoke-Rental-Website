<?php

namespace App\Http\Controllers;

use App\User;
use App\Videoke;
use App\Payment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AnotherReservationController extends Controller
{
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
            'videoke_id' => 'required',
            // 'reserved_at' => 'required',
            'qr_password' => '',
            'payment_id' => 'required',
        ]);

        // $return = request()->validate([
        //     'is_return' => ''
        // ]);
        
        auth()->user()->another_reservation()->create($data);
        // auth()->user()->another_return()->create($return);

        return redirect('/user/' . auth()->user()->id . '/account/home')->with('success', 'Hahaha');
    }
}
