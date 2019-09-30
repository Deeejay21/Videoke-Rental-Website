<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AccessController extends Controller
{
    public function show(User $user)
    {
        return view('admin.customers.access.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.customers.access.edit', compact('user'));
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'videoke_id' => '',
            'payment_id' => '',
            'usertype' => '',
            'is_paid' => '',
            'is_expired' => '',
            'is_return' => '',
        ]);

        $user->update($data);

        return redirect('/admin/customers/' . $user->id . '/access');
    }
}
