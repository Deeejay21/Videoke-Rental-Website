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

    public function firstPayment()
    {
        $currentTime = $this->currentTime();

        $usersNotification = User::where('usertype', 'User')->get();

        $users = User::where('usertype', 'User')->where('is_paid', 'Half Payment')->get();

        $anotherHalf = AnotherReservation::where('is_paid', 'Half Payment')->get();
        
        return view('admin.customers.first-payment', compact('anotherHalf', 'currentTime', 'usersNotification', 'users'));
    }

    public function fullyPaid()
    {
        $currentTime = $this->currentTime();

        $usersNotification = User::where('usertype', 'User')->get();

        $users = User::where('usertype', 'User')->where('is_paid', 'Paid')->get();

        $anotherPaid = AnotherReservation::where('is_paid', 'Paid')->get();
        
        return view('admin.customers.fully-paid', compact('anotherPaid', 'currentTime', 'usersNotification', 'users'));
    }

    public function paying()
    {
        $currentTime = $this->currentTime();

        $usersNotification = User::where('usertype', 'User')->get();

        $users = User::where('usertype', 'User')->where('is_paid', 'Paying')->get();

        $anotherPaying = AnotherReservation::where('is_paid', 'Paying')->get();
        
        return view('admin.customers.paying', compact('anotherPaying', 'currentTime', 'usersNotification', 'users'));
    }
    
    public function index()
    {
        $currentTime = $this->currentTime();

        $usersNotification = User::where('usertype', 'User')->get();

        // $anotherCustomer = AnotherReservation::all();

        $anotherCustomer = User::with('another_reservation')
            ->join('another_reservations', 'another_reservations.user_id', '=', 'users.id')
            ->select('another_reservations.*', 'users.first_name', 'users.last_name', 'users.age', 'users.gender', 'users.phone', 'users.email', 'users.is_expired')
            ->get();

        $users = User::where('usertype', 'User')->get();
        
        return view('admin.customers.index', compact('anotherCustomer', 'currentTime', 'usersNotification', 'users'));
    }

    // public function create()
    // {
    //     $videokes = Videoke::all();
    //     $payments = Payment::all();

    //     return view('admin.customers.create', compact('videokes', 'payments'));
    // }

    // public function store()
    // {
    //     $data = request()->validate([
    //         'first_name' => 'required',
    //         'last_name' => 'required',
    //         'gender' => 'required',
    //         'age' => 'required',
    //         'phone' => 'required',
    //         'email' => 'email|required|unique:users',
    //         'password' => 'required',
    //         'videoke_id' => 'required',
    //         'payment_id' => 'required',
    //     ]);

    //     User::create($data);

    //     return redirect('/admin/customers')->with('success', 'Customer has been added.');
    // }

    // public function show()
    // {
    //     //
    // }

    public function edit(User $user)
    {
        $currentTime = $this->currentTime();

        $usersNotification = User::where('usertype', 'User')->get();

        $videokes = Videoke::all();

        $payments = Payment::all();

        return view('admin.customers.edit', compact('currentTime', 'usersNotification', 'user', 'videokes', 'payments'));
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'checked_in_at' => '',
            'first_name' => '',
            'last_name' => '',
            'gender' => '',
            'age' => '',
            'phone' => '',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => '',
            'videoke_id' => '',
            'payment_id' => '',
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
