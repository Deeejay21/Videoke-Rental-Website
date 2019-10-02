<?php

namespace App\Http\Controllers;

use App\User;
use App\AnotherReservation;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function __construct()
    {
        $this->middleware(['auth' => 'verified']);
    }
    
    public function home(User $user, AnotherReservation $anotherReservation)
    {
        $anotherPaying = AnotherReservation::where([['is_paid', 'Paying'], ['is_return', 'Operating']])->get();

        $anotherHalf = AnotherReservation::where([['is_paid', 'Half Payment'], ['is_return', 'Operating']])->get();

        $anotherPaid = AnotherReservation::where([['is_paid', 'Paid'], ['is_return', 'Operating']])->get();

        $anotherPaidReturn = AnotherReservation::where([['is_paid', 'Paid'], ['is_return', 'Return']])->get();

        $anotherPaidReturnCount = $anotherPaidReturn->count();
        
        return view('users.accounts.home', compact('anotherPaidReturnCount', 'anotherPaidReturn', 'anotherPaid', 'anotherHalf', 'anotherPaying', 'user'));
    }

    public function personalinformation(User $user)
    {
        //    $this->authorize('viewAny', User::class);
        $another = AnotherReservation::all();

        $anotherPaying = AnotherReservation::where([['is_paid', 'Paying'], ['is_return', 'Operating']])->get();

        $anotherHalf = AnotherReservation::where([['is_paid', 'Half Payment'], ['is_return', 'Operating']])->get();

        $anotherPaid = AnotherReservation::where([['is_paid', 'Paid'], ['is_return', 'Operating']])->get();

        $anotherOperating = AnotherReservation::where('is_return', 'Operating')->get();

        $anotherPaidReturn = AnotherReservation::where([['is_paid', 'Paid'], ['is_return', 'Return']])->get();

        $anotherPaidReturnCount = $anotherPaidReturn->count();

        $another = $another->count();

        return view('users.accounts.personalinformation', compact('another', 'anotherOperating', 'anotherPaidReturnCount', 'anotherPaidReturn', 'anotherPaid', 'anotherHalf', 'anotherPaying', 'user'));
    }

    public function reservation(User $user)
    {
        $anotherPaying = AnotherReservation::where([['is_paid', 'Paying'], ['is_return', 'Operating']])->get();

        return view('users.accounts.reservation', compact('anotherPaying', 'user'));
    }

    public function payment(User $user)
    {
        $anotherPaying = AnotherReservation::where([['is_paid', 'Paying'], ['is_return', 'Operating']])->get();

        $anotherHalf = AnotherReservation::where([['is_paid', 'Half Payment'], ['is_return', 'Operating']])->get();

        $anotherPaid = AnotherReservation::where([['is_paid', 'Paid'], ['is_return', 'Operating']])->get();

        $anotherPaidReturn = AnotherReservation::where([['is_paid', 'Paid'], ['is_return', 'Return']])->get();

        $anotherPaidReturnCount = $anotherPaidReturn->count();

        return view('users.accounts.payment', compact('anotherPaidReturnCount', 'anotherPaidReturn', 'anotherPaid', 'anotherHalf', 'anotherPaying', 'user'));
    }

    public function preview(User $user)
    {
        return view('users.accounts.preview', compact('user'));
    }
}
