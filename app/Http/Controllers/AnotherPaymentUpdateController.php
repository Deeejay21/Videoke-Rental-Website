<?php

namespace App\Http\Controllers;

use App\User;
use App\Payment;
use App\Videoke;
use Illuminate\Http\Request;

class AnotherPaymentUpdateController extends Controller
{
    public function edit(User $user)
    {
        $payments = Payment::all();

        $videokes = Videoke::all();

        $anotherPayment = $user->another_reservation->where('is_paid', 'Paying');

        return view('users.accounts.payment-updates', compact('videokes', 'payments', 'user', 'anotherPayment'));
    }

    public function update()
    {
        $data = request()->validate([
            'payment_id' => 'required'
        ]);

        auth()->user()->another_reservation()->where('is_paid', 'Paying')->update($data);

        // dd(request()->all());

        return redirect('/user/' . auth()->user()->id . '/account/payment')->with('update', 'Your payment has been updated successfully.');
    }
}
