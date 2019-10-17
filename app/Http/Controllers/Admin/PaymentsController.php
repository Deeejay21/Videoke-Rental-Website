<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentsController extends Controller
{
    public function index(User $user)
    {
        $payments = Payment::all();

        return view('admin.payments.index', compact('payments', 'user'));
    }

    public function create(User $user)
    {
        return view('admin.payments.create', compact('user'));
    }

    public function store(Payment $payment)
    {
        Payment::create($this->validateRequest());

        return redirect('/admin/payments')->with('success', 'Payment has been successfully added.');
    }

    public function edit(User $user, Payment $payment)
    {
        return view('admin.payments.edit', compact('payment', 'user'));
    }

    public function update(Payment $payment)
    {
        $payment->update($this->validateRequest());

        return redirect('/admin/payments')->with('update', 'Payment has been successfully updated.');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();

        return redirect('/admin/payments')->with('delete', 'Payment has been successfully deleted.');
    }

    private function validateRequest()
    {
        return request()->validate([
            'name'           => 'required',
            'account_number' => 'required',
        ]);
    }
}
