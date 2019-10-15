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
        if (Auth::attempt(['qr_password' => request('qr_password')]) == false){
            var_dump('qr is not match');
        }
        else{
            var_dump('qr match!');
            // return redirect('/user/' . auth()->user()->id . '/account/home');
        }

        // if (auth()->attempt(request(['email', 'password'])) == false) {
        //     return back()->withErrors([
        //         'message' => 'The email or password is incorrect, please try again'
        //     ]);
        // }
        
        // return redirect()->to('/games');
    }
}
