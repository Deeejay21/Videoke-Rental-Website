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
        $videokes = Videoke::all();

        $payments = Payment::all();

        $anotherDetails = AnotherReservation::all();

        $anotherReserve = User::with('another_reservation')
            ->join('another_reservations', 'another_reservations.user_id', '=', 'users.id')
            ->select('another_reservations.*', 'users.id', 'users.first_name', 'users.last_name', 'users.gender', 'users.age', 'users.phone', 'users.email')
            ->orderBy('created_at', 'ASC')
            ->get();

        foreach ($anotherReserve as $reserve) {
            $reserve;
        }

        $reserve = $reserve;

        return view('admin.customers.another_customer.edit', compact(
            'anotherReservation', 
            'anotherReserve', 
            'anotherDetails', 
            'payments',
            'videokes', 
            'reserve', 
            'user', 
        ));
    }

    public function update(AnotherReservation $anotherReservation)
    {
        $data = request()->validate([
            'videoke_id'    => '',
            'payment_id'    => '',
            'reserved_at'   => '',
        ]);

        $anotherReservation->update($data);

        return redirect('/admin/customers')->with('update', 'Customer ' . '' .  ' has been updated.');
    }

    public function destroy(AnotherReservation $anotherReservation)
    {
        $anotherReservation->delete();

        return redirect('/admin/customers')->with('delete', 'Customer ' . $anotherReservation->id .  ' has been deleted.');
    }
}
