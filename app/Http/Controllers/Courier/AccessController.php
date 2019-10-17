<?php

namespace App\Http\Controllers\Courier;

use App\User;
use Carbon\Carbon;
use App\AnotherReservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccessController extends Controller
{
    public function show(User $user)
    {
        $anotherReservation = User::with('another_reservation')
            ->join('another_reservations', 'another_reservations.user_id', '=', 'users.id')
            ->select('another_reservations.*', 'users.id', 'users.usertype', 'users.first_name', 'users.last_name', 'users.gender', 'users.age', 'users.phone', 'users.email')
            ->where('another_reservations.is_return', 'Operating')
            ->whereIn('another_reservations.is_paid', ['Paid', 'Half Payment'])
            ->where('users.usertype', 'User')
            ->get();
            
        return view('courier.customers.access.show', compact('anotherReservation', 'user'));
    }

    public function edit(User $user)
    {
        $currentDate = Carbon::now('Asia/Manila');

        return view('courier.customers.access.edit', compact('currentDate', 'user'));
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'is_return'                => '',
            'videoke_return_issued_at' => '',
        ]);

        $user->update($data);

        return redirect('/courier/customers')->with('success', 'The videoke of ' . $user->first_name .  ' has been returned successfully.');
    }
}