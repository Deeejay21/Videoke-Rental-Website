<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ConfirmReturnController extends Controller
{
    public function edit(User $user)
    {
        $usersNotification = User::where('usertype', 'User')->get();

        $currentTime = $this->currentTime();

        $currentDate = Carbon::now('Asia/Manila');

        return view('users.qrcodereturn.edit', compact('currentDate', 'currentTime', 'usersNotification', 'user'));
    }
    
    public function update(Request $request, User $user)
    {
        $data = request()->validate([
            'qr_password' => 'required',
            'is_paid' => '',
            'qrcode_issued_at' => ''
        ], [
            'qr_password.required' => 'The QR Code is required.',
        ]);

        // $qrs = User::with('another_reservation')
        //     ->join('another_reservations', 'another_reservations.user_id', '=', 'users.id')
        //     ->select('another_reservations.qr_password', 'another_reservations.is_return', 'another_reservations.is_paid', 'users.id')
        //     ->where('another_reservations.is_return', 'Operating')
        //     ->whereIn('another_reservations.is_paid', ['Paid', 'Half Payment'])
        //     ->where('users.usertype', 'User')
        //     ->get();

        // foreach ($qrs as $qr) {
        //     $qr;
        // }

        // $qr = $qr->qr_password;

        // $qr = $user->another_reservation;
        $qr = User::with('another_reservation')
            ->join('another_reservations', 'another_reservations.user_id', '=', 'users.id')
            ->select('another_reservations.qr_password', 'users.id')
            ->get();

        // foreach ($qr->reverse() as $qr_pasword) {
        foreach ($qr as $qr_pasword) {
            $qr_pasword;
        }

        $qr_password = $qr_pasword->qr_password;

        if ($request->qr_password === $qr_password) {
            // $user->another_reservation()->update($data);
    
            $user->another_reservation()->where('is_paid', 'Half Payment')->update($data);

            return redirect('/courier/customers')->with('success', 'Customer ' . $user->first_name . ' payment done successfully.');
            // var_dump('Password is confirm');
        } else {
            return redirect('/courier/customers/' . $user->id . '/access/qrerror');
            // var_dump('Password is not confirm');
        }
    }
}
