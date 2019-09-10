<?php

namespace App\Http\Controllers\Courier;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccessController extends Controller
{
    public function show(User $user)
    {
        return view('courier.customers.access.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('courier.customers.access.edit', compact('user'));
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'usertype' => '',
            'is_paid' => '',
            'is_expired' => '',
            'is_return' => '',
        ]);

        $user->update($data);

        return redirect('/courier/customers/' . $user->id . '/access');
    }
}