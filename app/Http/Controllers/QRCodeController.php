<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class QRCodeController extends Controller
{
    public function create(User $user)
    {
        $usersNotification = User::where('usertype', 'User')->get();

        $currentTime = $this->currentTime();

        return view('users.qrcode.create', compact('usersNotification', 'currentTime', 'user'));
    }

    public function store(Request $request, User $user)
    {
        $data = request()->validate([
            'qr_password' => 'required',
        ], [
            'qr_password.required' => 'The QR Code is required.',
        ]);

        if ($request->qr_password === $user->qr_code->qr_password) {
            $user->qr_code()->update($data);
    
            $status = request()->validate([
                'is_paid' => ''
            ]);
            
            $user->qr_code()->update($data);
            $user->update($status);
            
            return redirect('/courier/customers/' . $user->id . '/access')->with('success', 'Customer ' . $user->first_name . ' payment done successfully.');
        } else {
            return redirect('/courier/customers/' . $user->id . '/access/qrerror');
        }

    }
}
