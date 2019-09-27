<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class QRCodeController extends Controller
{
    public function create(User $user)
    {
        return view('users.qrcode.create', compact('user'));
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
            
            return redirect('/courier/customers/' . $user->id . '/access');
        } else {
            return redirect('/courier/customers/' . $user->id . '/access/qrerror');
        }

    }
}
