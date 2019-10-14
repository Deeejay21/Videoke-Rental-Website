<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AccessController extends Controller
{
    public function show(User $user)
    {
        $usersNotification = User::where('usertype', 'User')->get();

        $currentTime = $this->currentTime();

        return view('admin.customers.access.show', compact('currentTime', 'usersNotification', 'user'));
    }

    public function edit(User $user)
    {
        $usersNotification = User::where('usertype', 'User')->get();

        $currentTime = $this->currentTime();

        $currentDate = Carbon::now('Asia/Manila');

        return view('admin.customers.access.edit', compact('currentDate', 'currentTime', 'usersNotification', 'user'));
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
            'videoke_return_issued_at' => '',
        ]);

        $user->update($data);

        return redirect('/admin/customers/' . $user->id . '/access')->with('update', 'Customer ' . $user->first_name .  ' has been updated successfully.');
    }
}
