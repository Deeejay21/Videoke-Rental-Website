<?php

namespace App\Http\Controllers;

use App\User;
use App\Videoke;
use Illuminate\Http\Request;

class ReservationUpdateController extends Controller
{
    public function __construct()
    {
        $this->middleware(['edit_reservation'])->only(['edit']);
    }
    
    public function edit(User $user)
    {
        $videokes = Videoke::all();

        return view('users.accounts.reserve-update', compact('user', 'videokes'));
    }

    public function update()
    {
        $data = request()->validate([
            'checked_in_at' => 'required',
            'videoke_id' => 'required'
        ]);

        auth()->user()->update($data);

        // dd(request()->all());

        return redirect('/user/' . auth()->user()->id . '/account/reservation')->with('update', 'Your Reservation Details has been updated successfully.');
    }   
}
