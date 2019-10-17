<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use App\AnotherReservation;
use Illuminate\Http\Request;

class QRCodeController extends Controller
{
    public function edit(User $user)
    {
        $currentDate = Carbon::now('Asia/Manila');

        return view('users.qrcode.edit', compact('currentDate', 'user'));
    }

    public function update(Request $request, User $user)
    {
        $data = request()->validate([
            'qr_password' => 'required',
        ], [
            'qr_password.required' => 'The QR Code is required.',
        ]);

        if ($request->qr_password === $user->qr_code->qr_password) {
            $user->qr_code()->update($data);
    
            $status = request()->validate([
                'is_paid'          => '',
                'qrcode_issued_at' => '',
            ]);
            
            $user->qr_code()->update($data);

            $user->update($status);
            
            return redirect('/courier/customers')->with('success', 'Customer ' . $user->first_name . ' payment done successfully.');
        } else {
            return redirect('/courier/customers/' . $user->id . '/access/qrerror');
        }
    }
}
