<?php

namespace App\Http\Controllers\Courier;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccessController extends Controller
{
    public function show(User $user)
    {
        $usersNotification = User::where('usertype', 'User')->get();
        
        $currentTime = $this->currentTime();

        return view('courier.customers.access.show', compact('usersNotification', 'currentTime', 'user'));
    }

    public function edit(User $user)
    {
        $usersNotification = User::where('usertype', 'User')->get();
        
        $currentTime = $this->currentTime();

        return view('courier.customers.access.edit', compact('usersNotification', 'currentTime', 'user'));
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

        return redirect('/courier/customers')->with('success', 'Videoke of ' . $user->first_name .  ' has been returned.');
    }
}