<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Endroid\QrCode\QrCode;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function home(User $user)
    {
        $qrCode = new QrCode('Dear ' . $user->first_name . ', it is submitted that the payment worth ₱' . ($user->videoke->price / 2) . '.00 Via ' . $user->payment->name . ' has been successful. Please print this receipt or the QR Code and give it to our delivery boy so we can transact properly. This is for our customer safety that we assure that you are the one who reserve in our website. Thank you.');
        $qrCode->setSize(250);
        $qrCode->setWriterByName('svg');

        return view('users.accounts.home', compact('user', 'qrCode'));
    }

    // public function qrcode(User $user)
    // {
    //     return \QRCode::text('Hi ' . $user->first_name . '! YOURE SO HANDSOME OMG.')
    //                        ->setSize(12)
    //                        ->setMargin(10)
    //                        ->setErrorCorrectionLevel('H')
    //                        ->svg();
    // }

    // public function qrcode(User $user)
    // {
        
    // }
    
    public function personalinformation(User $user)
    {
        //    $this->authorize('viewAny', User::class);

        return view('users.accounts.personalinformation', compact('user'));
    }

    public function reservation(User $user)
    {
        return view('users.accounts.reservation', compact('user'));
    }

    public function payment(User $user)
    {
        return view('users.accounts.payment', compact('user'));
    }
}
