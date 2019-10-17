<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use App\AnotherReservation;
use Illuminate\Http\Request;

class VideokeReturnController extends Controller
{
    public function edit(User $user)
    {
        $currentDate = Carbon::now('Asia/Manila');

        $anotherReservation = User::with('another_reservation')
            ->join('another_reservations', 'another_reservations.user_id', '=', 'users.id')
            ->select('another_reservations.*', 'users.id', 'users.usertype', 'users.first_name', 'users.last_name', 'users.gender', 'users.age', 'users.phone', 'users.email')
            ->where('another_reservations.is_return', 'Operating')
            ->whereIn('another_reservations.is_paid', ['Paid', 'Half Payment'])
            ->where('users.usertype', 'User')
            ->get();

        return view('users.videoke-return.edit', compact(
            'anotherReservation', 
            'currentDate', 
            'user'
        ));
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'is_return'                => '',
            'videoke_return_issued_at' => ''
        ]);

        $user->another_reservation()->where('is_return', 'Operating')->update($data);

        return redirect('/courier/customers')->with('success', 'The videoke of ' . $user->first_name .  ' has been returned successfully.');
    }
}
