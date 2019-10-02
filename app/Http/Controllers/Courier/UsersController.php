<?php

namespace App\Http\Controllers\Courier;

use App\User;
use App\Videoke;
use App\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::where([['usertype', 'User'], ['is_return', 'Operating']])->whereIn('is_paid', ['Half Payment', 'Paid'])->get();

        $usersNotification = User::where('usertype', 'User')->get();

        $currentTime = $this->currentTime();

        return view('courier.customers.index', compact('usersNotification', 'currentTime', 'users'));
    }

    // public function create()
    // {
    //     $videokes = Videoke::all();
    //     $payments = Payment::all();

    //     return view('courier.customers.create', compact('videokes', 'payments'));
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

    //     return redirect('/courier/customers')->with('success', 'Customer has been added.');
    // }

    // public function show()
    // {
    //     //
    // }

    public function edit(User $user)
    {
        $videokes = Videoke::all();

        $payments = Payment::all();

        $usersNotification = User::where('usertype', 'User')->get();

        $currentTime = $this->currentTime();

        return view('courier.customers.edit', compact('usersNotification', 'currentTime', 'user', 'videokes', 'payments'));
    }

    public function update(User $user)
    {
        $user->update($this->validateRequest());


        return redirect('/courier/customers')->with('update', 'Customer ' . $user->first_name .  ' has been updated.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/courier/customers')->with('delete', 'Customer ' . $user->first_name .  ' has been deleted.');
    }

    private function validateRequest()
    {
        return request()->validate([
            'checked_in_at' => '',
            'first_name' => '',
            'last_name' => '',
            'gender' => '',
            'age' => '',
            'phone' => '',
            'email' => '',
            'password' => '',
            'videoke_id' => '',
            'payment_id' => '',
        ]);
    }
}
