<?php

namespace App\Http\Controllers;

use App\User;
use App\Videoke;
use Illuminate\Http\Request;

class AnotherReservationUpdateController extends Controller
{
    public function edit(User $user)
    {
        $videokes = Videoke::all();

        $anotherReserve = $user->another_reservation->where('is_paid', 'Paying');

        return view('users.accounts.reserve-updates', compact('user', 'videokes', 'anotherReserve'));
    }

    public function update()
    {
        $data = request()->validate([
            // 'checked_in_at' => 'required',
            'videoke_id' => 'required',
        ]);

        auth()->user()->another_reservation()->where('is_paid', 'Paying')->update($data);
        
        // dd(request()->all());

        return redirect('/user/' . auth()->user()->id . '/account/reservation')->with('update', 'Your reservation has been updated successfully.');
    }
}
