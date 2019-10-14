<?php

namespace App\Http\Controllers;

use App\User;
use App\Videoke;
use App\AnotherReservation;
use Illuminate\Http\Request;

class AnotherReservationUpdateController extends Controller
{
    public function edit(User $user)
    {
        $videokes = Videoke::all();

        $anotherReserve = $user->another_reservation->where('is_paid', 'Paying');

        return view('users.accounts.reserve-updates', compact('user', 'videokes', 'anotherReserve'));
    }

    public function update(User $user)
    {
        // $date = User::with('another_reservation')
        //     ->join('another_reservations', 'another_reservations.user_id', '=', 'users.id')
        //     ->select('another_reservations.reserved_at', 'users.id')
        //     ->get();

        // foreach ($date as $date) {
        //     $date;
        // }

        // $reserved_date = $date->reserved_at;

        $data = request()->validate([
            'reserved_at' => 'required',
            'videoke_id' => 'required',
        ]);

        // auth()->user()->another_reservation()->where('is_paid', 'Paying')->update($data);
        auth()->user()->another_reservation()->where('is_paid', 'Paying')->update($data);
        
        // dd(request()->all());

        return redirect('/user/' . auth()->user()->id . '/account/reservation')->with('update', 'Your reservation has been updated successfully.');
    }
}
