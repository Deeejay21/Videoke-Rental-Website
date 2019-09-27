<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class ConfirmationController extends Controller
{
    public function edit(User $user)
    {
        return view('admin.customers.access.confirmation.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = request()->validate([
            'current_email' => 'required|email'
        ]);

        if ($request->current_email === $user->email) {
            var_dump('Password Confirm!');
        } else {
            var_dump('Password is not match!');
        }

        // if(Hash::check($request->current_password, $user->password)) {
        //     var_dump('Password Confirm!');
        // } else {
        //     var_dump('Password is not match!');
        // }
    }
}
