<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Videoke;
use App\Payment;
use App\AnotherReservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnotherUserController extends Controller
{
    public function edit(User $user, AnotherReservation $anotherReservation)
    {
        $currentTime = $this->currentTime();

        $usersNotification = User::where('usertype', 'User')->get();

        $videokes = Videoke::all();

        $payments = Payment::all();

        // $anotherDetails = User::with('another_reservation')
        //     ->join('another_reservations', 'another_reservations.user_id', '=', 'users.id')
        //     ->select('another_reservations.*', 'users.id', 'users.first_name', 'users.last_name', 'users.gender', 'users.age', 'users.phone', 'users.email')
        //     ->get();

        $anotherDetails = AnotherReservation::all();

        // $anotherReserve = $user->another_reservation;

        $anotherReserve = User::with('another_reservation')
            ->join('another_reservations', 'another_reservations.user_id', '=', 'users.id')
            ->select('another_reservations.*', 'users.id', 'users.first_name', 'users.last_name', 'users.gender', 'users.age', 'users.phone', 'users.email')
            ->orderBy('created_at', 'ASC')
            ->get();

        foreach ($anotherReserve as $reserve) {
            $reserve;
        }

        $reserve = $reserve;

        return view('admin.customers.another_customer.edit', compact('anotherReservation', 'reserve', 'anotherReserve', 'anotherDetails', 'currentTime', 'usersNotification', 'user', 'videokes', 'payments'));
    }

    public function update(AnotherReservation $anotherReservation)
    {
        $data = request()->validate([
            'reserved_at' => '',
            'videoke_id' => '',
            'payment_id' => '',
        ]);

        $anotherReservation->update($data);

        // dd(request()->all());

        return redirect('/admin/customers')->with('update', 'Customer ' . '' .  ' has been updated.');
    }

    public function destroy(AnotherReservation $anotherReservation)
    {
        $anotherReservation->delete();

        return redirect('/admin/customers')->with('delete', 'Customer ' . $anotherReservation->id .  ' has been deleted.');
    }
}
