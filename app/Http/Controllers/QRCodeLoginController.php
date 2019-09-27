<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class QRCodeLoginController extends Controller
{
    public function create()
    {
        return view('users.qrcodelogin.create');
    }

    // public function store(Request $request)
    // {
    //     $data = request()->validate([
    //         'qr_password' => 'required',
    //     ], [
    //         'qr_password.required' => 'The QR Code is required.',
    //     ]);

    //     $users = User::all();

    //     foreach ($users as $user) {

    //         if ($request->qr_password === $user->qr_code->qr_password) {
    //             $user->qr_code()->update($data);
                
    //             var_dump('Password is confirm');
    //             // return redirect('qrcode');
    //         } else {
    //             var_dump('Password is not match!');
    //         }

    //     }

    // }

    public function store()
    {
        if(Auth::attempt(['qr_password' => request('qr_password')])){
            Auth::user();
            
            return response()->json(['success' => $success], 200);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }
    
    // protected function credentials(Request $request)
    // {
    //     // return $request->only($this->username(), 'password');
    //     return ['email'=>$request->{$this->username()},'password'=>$request->password,'is_expired'=> 'Active'];
    // }
}
