<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QRCodeController extends Controller
{
    public function create(User $user)
    {
        $currentDate = Carbon::now('Asia/Manila');

        return view('admin.qrcode.create', compact('currentDate', 'user'));
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
                'is_paid'          => '',
                'qrcode_issued_at' => '',
            ]);
            
            $user->qr_code()->update($data);
            
            $user->update($status);
            
            return redirect('/admin/customers/' . $user->id . '/access')->with('success', 'Customer ' . $user->first_name . ' payment done successfully.');
        } else {
            return redirect('/admin/customers/' . $user->id . '/access/qrerror');
        }

    }
}
