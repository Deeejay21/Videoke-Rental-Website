<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Videoke;
use App\Payment;
use App\AnotherReservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{

    public function firstPayment(User $user)
    {
        $users = User::where('usertype', 'User')->where('is_paid', 'Half Payment')->get();

        $anotherHalf = AnotherReservation::where('is_paid', 'Half Payment')->get();
        
        return view('admin.customers.first-payment', compact(
            'anotherHalf', 
            'users',
            'user', 
        ));
    }

    public function fullyPaid(User $user)
    {
        $users = User::where('usertype', 'User')->where('is_paid', 'Paid')->get();

        $anotherPaid = AnotherReservation::where('is_paid', 'Paid')->get();
        
        return view('admin.customers.fully-paid', compact(
            'anotherPaid', 
            'users',
            'user', 
        ));
    }

    public function paying(User $user)
    {
        $users = User::where('usertype', 'User')->where('is_paid', 'Paying')->get();

        $anotherPaying = AnotherReservation::where('is_paid', 'Paying')->get();
        
        return view('admin.customers.paying', compact(
            'anotherPaying', 
            'users',
            'user', 
        ));
    }
    
    public function index()
    {
        $anotherCustomer = User::with('another_reservation')
            ->join('another_reservations', 'another_reservations.user_id', '=', 'users.id')
            ->select('another_reservations.*', 'users.first_name', 'users.last_name', 'users.age', 'users.gender', 'users.phone', 'users.email', 'users.is_expired', 'users.address', 'users.address_2', 'users.city', 'users.brgy', 'users.zip')
            ->get();

        $users = User::where('usertype', 'User')->get();
        
        return view('admin.customers.index', compact('anotherCustomer', 'users'));
    }

    public function edit(User $user)
    {
        $videokes = Videoke::all();

        $payments = Payment::all();

        return view('admin.customers.edit', compact(
            'payments',
            'videokes', 
            'user', 
        ));
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'age'               => '',
            'email'             => 'required|email|unique:users,email,'.$user->id,
            'phone'             => '',
            'gender'            => '',
            'password'          => '',
            'last_name'         => '',
            'first_name'        => '',
            'videoke_id'        => '',
            'payment_id'        => '',
            'checked_in_at'     => '',
        ]);

        $user->update($data);

        return redirect('/admin/customers')->with('update', 'Customer ' . $user->first_name .  ' has been updated.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/admin/customers')->with('delete', 'Customer ' . $user->first_name .  ' has been deleted.');
    }

}
