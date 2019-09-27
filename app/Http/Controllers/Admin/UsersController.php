<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\User;
use App\Videoke;
use App\Payment;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        
        return view('admin.customers.index', compact('users'));
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
        $videokes = Videoke::all();
        $payments = Payment::all();

        return view('admin.customers.edit', compact('user', 'videokes', 'payments'));
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
