<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Payment;

class PaymentsController extends Controller
{
    public function index()
    {
        $payments = Payment::all();

        return view('admin.payments.index', compact('payments'));
    }

    public function create()
    {
        return view('admin.payments.create');
    }

    public function store(Payment $payment)
    {
        Payment::create($this->validateRequest());

        return redirect('/admin/payments')->with('success', 'Payment has been successfully added.');
    }

    public function edit(Payment $payment)
    {
        return view('admin.payments.edit', compact('payment'));
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
            'name' => 'required',
            'account_number' => 'required',
        ]);
    }
}
