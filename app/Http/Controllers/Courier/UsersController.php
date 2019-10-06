<?php

namespace App\Http\Controllers\Courier;

use App\User;
use App\Videoke;
use App\Payment;
use App\AnotherReservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index(User $user)
    {
        $users = User::where([['usertype', 'User'], ['is_return', 'Operating']])->whereIn('is_paid', ['Half Payment', 'Paid'])->get();

        $anotherReservation = User::with('another_reservation')
            ->join('another_reservations', 'another_reservations.user_id', '=', 'users.id')
            ->select('another_reservations.*', 'users.id', 'users.usertype', 'users.first_name', 'users.last_name', 'users.gender', 'users.age', 'users.phone', 'users.email')
            ->where('another_reservations.is_return', 'Operating')
            // ->where('another_reservations.user_id', 'users.id')
            ->whereIn('another_reservations.is_paid', ['Paid', 'Half Payment'])
            ->where('users.usertype', 'User')
            ->get();

        // $user = User::find(4);

        // $anotherReservation = AnotherReservation::with('user')
        //     ->join('users', 'users.id', '=', 'another_reservations.id')
        //     ->select('users.id', 'users.first_name', 'users.last_name', 'users.email', 'users.age', 'users.gender', 'users.phone', 'another_reservations.*')
        //     ->where('users.usertype', 'User')
        //     ->whereIn('another_reservations.is_paid', ['Paid', 'Half Payment'])
        //     ->get();


        $usersNotification = User::where('usertype', 'User')->get();

        $currentTime = $this->currentTime();

        return view('courier.customers.index', compact('anotherReservation', 'usersNotification', 'currentTime', 'users'));
    }

    public function edit(User $user)
    {
        $videokes = Videoke::all();

        $payments = Payment::all();

        $usersNotification = User::where('usertype', 'User')->get();

        $currentTime = $this->currentTime();

        return view('courier.customers.edit', compact('usersNotification', 'currentTime', 'user', 'videokes', 'payments'));
    }

    public function update(User $user)
    {
        $user->update($this->validateRequest());


        return redirect('/courier/customers')->with('update', 'Customer ' . $user->first_name .  ' has been updated.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/courier/customers')->with('delete', 'Customer ' . $user->first_name .  ' has been deleted.');
    }

    private function validateRequest()
    {
        return request()->validate([
            'checked_in_at' => '',
            'first_name' => '',
            'last_name' => '',
            'gender' => '',
            'age' => '',
            'phone' => '',
            'email' => '',
            'password' => '',
            'videoke_id' => '',
            'payment_id' => '',
        ]);
    }
}
