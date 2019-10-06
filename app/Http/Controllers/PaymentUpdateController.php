<?php

namespace App\Http\Controllers;

use App\User;
use App\Payment;
use Illuminate\Http\Request;

class PaymentUpdateController extends Controller
{
    public function edit(User $user)
    {
        $payments = Payment::all();

        return view('users.accounts.payment-update', compact('user', 'payments'));
    }

    public function update()
    {
        $data = request()->validate([
            'payment_id' => 'required'
        ]);

        auth()->user()->update($data);

        // dd(request()->all());

        return redirect('/user/' . auth()->user()->id . '/account/payment')->with('update', 'Your Payment Details has been updated successfully.');
    }
}
