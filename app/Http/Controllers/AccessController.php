<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AccessController extends Controller
{
    public function show(User $user)
    {
        return view('admin.customers.access.show', compact('user'));
    }

    public function edit(User $user)
    {
        $currentDate = Carbon::now('Asia/Manila');

        return view('admin.customers.access.edit', compact('currentDate', 'user'));
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'videoke_return_issued_at' => '',
            'videoke_id'               => '',
            'payment_id'               => '',
            'is_expired'               => '',
            'is_return'                => '',
            'usertype'                 => '',
            'is_paid'                  => '',
        ]);

        $user->update($data);

        return redirect('/admin/customers/' . $user->id . '/access')->with('update', 'Customer ' . $user->first_name .  ' has been updated successfully.');
    }
}
