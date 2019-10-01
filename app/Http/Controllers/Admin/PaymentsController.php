<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentsController extends Controller
{
    public function index()
    {
        $payments = Payment::all();

        $currentTime = $this->currentTime();

        $usersNotification = User::where('usertype', 'User')->get();

        return view('admin.payments.index', compact('payments', 'usersNotification', 'currentTime'));
    }

    public function create()
    {
        
        $currentTime = $this->currentTime();

        $usersNotification = User::where('usertype', 'User')->get();

        return view('admin.payments.create', compact('currentTime', 'usersNotification'));
    }

    public function store(Payment $payment)
    {
        Payment::create($this->validateRequest());

        return redirect('/admin/payments')->with('success', 'Payment has been successfully added.');
    }

    public function edit(Payment $payment)
    {
        $currentTime = $this->currentTime();

        $usersNotification = User::where('usertype', 'User')->get();

        return view('admin.payments.edit', compact('payment', 'usersNotification', 'currentTime'));
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
