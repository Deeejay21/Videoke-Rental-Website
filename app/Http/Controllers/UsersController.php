<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Videoke;
use App\AnotherReturn;
use App\AnotherReservation;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth' => 'verified']);
        $this->middleware(['edit'])->only(['edit']);
        $this->middleware(['customer_status'])->only(['home', 'personalinformation', 'reservation', 'payment']);
        $this->middleware('customer')->except('update');
    }
    
    public function home(User $user)
    {
        $anotherPaying = auth()->user()->another_reservation()->where([['is_paid', 'Paying'], ['is_return', 'Operating']])->get();

        $anotherHalf = auth()->user()->another_reservation()->where([['is_paid', 'Half Payment'], ['is_return', 'Operating']])->get();

        $anotherPaid = auth()->user()->another_reservation()->where([['is_paid', 'Paid'], ['is_return', 'Operating']])->get();

        $anotherPaidReturn = auth()->user()->another_reservation()->where([['is_paid', 'Paid'], ['is_return', 'Return']])->get();

        $anotherPaidReturnCount = $anotherPaidReturn->count();

        $videokes = Videoke::all();

        return view('users.accounts.home', compact(
            'anotherPaidReturnCount', 
            'anotherPaidReturn', 
            'anotherPaying', 
            'anotherPaid', 
            'anotherHalf', 
            'videokes', 
            'user'
        ));
    }

    public function edit(User $user)
    {
        $videokes = Videoke::all();

        return view('users.accounts.edit', compact('videokes', 'user'));
    }

    public function update()
    {
        $data = request()->validate([
            'first_name'        => 'required|string|max:255|regex:/^[a-zA-Z ]+$/',
            'last_name'         => 'required|string|max:255|regex:/^[a-zA-Z ]+$/',
            'age'               => 'required|integer|min:18|max:70',
            'phone'             => 'required|phone:PH',
            'gender'            => 'required|string|max:255|not_in:0',
            'address'           => 'required|string|max:255',
            'address_2'         => 'required|string|max:255',
            'city'              => 'required|string|max:255',
            'brgy'              => 'required|string|max:255',
            'zip'               => 'required|integer',
        ], [
            'first_name.regex'  => 'Please avoid using numbers.',
            'last_name.regex'   => 'Please avoid using numbers.',
            'gender.not_in'     => 'The gender field is required.',
            'phone.phone'       => 'The phone format is invalid.',
            'age.min'           => 'The age must be at least 18 years old.',
            'age.max'           => 'The age may not be greater than 70 years old.',
        ]);

        auth()->user()->update($data);

        return redirect('/user/' . auth()->user()->id . '/account/personalinformation')->with('update', 'Your Personal Information has been updated successfully.');
    }

    public function personalinformation(User $user)
    {
        $videokes = Videoke::all();

        $another = auth()->user()->another_reservation()->get();

        $anotherPaying = auth()->user()->another_reservation()->where([['is_paid', 'Paying'], ['is_return', 'Operating']])->get();

        $anotherHalf = auth()->user()->another_reservation()->where([['is_paid', 'Half Payment'], ['is_return', 'Operating']])->get();

        $anotherPaid = auth()->user()->another_reservation()->where([['is_paid', 'Paid'], ['is_return', 'Operating']])->get();

        $anotherOperating = auth()->user()->another_reservation()->where('is_return', 'Operating')->get();

        $anotherPaidReturn = auth()->user()->another_reservation()->where([['is_paid', 'Paid'], ['is_return', 'Return']])->get();

        $anotherPaidReturnCount = $anotherPaidReturn->count();

        $another = $another->count();

        return view('users.accounts.personalinformation', compact(
            'anotherPaidReturnCount', 
            'anotherPaidReturn', 
            'anotherOperating', 
            'anotherPaying', 
            'anotherPaid', 
            'anotherHalf', 
            'videokes', 
            'another', 
            'user'
        ));
    }

    public function reservation(User $user)
    {
        $videokes = Videoke::all();

        $anotherPaying = auth()->user()->another_reservation()->where([['is_paid', 'Paying'], ['is_return', 'Operating']])->get();

        return view('users.accounts.reservation', compact(
            'anotherPaying', 
            'videokes', 
            'user'
        ));
    }

    public function payment(User $user)
    {
        $videokes = Videoke::all();

        $anotherPaying = auth()->user()->another_reservation()->where([['is_paid', 'Paying'], ['is_return', 'Operating']])->get();

        $anotherHalf = auth()->user()->another_reservation()->where([['is_paid', 'Half Payment'], ['is_return', 'Operating']])->get();

        $anotherPaid = auth()->user()->another_reservation()->where([['is_paid', 'Paid'], ['is_return', 'Operating']])->get();

        $anotherPaidReturn = auth()->user()->another_reservation()->where([['is_paid', 'Paid'], ['is_return', 'Return']])->get();

        $anotherPaidReturnCount = $anotherPaidReturn->count();

        return view('users.accounts.payment', compact(
            'anotherPaidReturnCount', 
            'anotherPaidReturn', 
            'anotherPaying', 
            'anotherPaid', 
            'anotherHalf', 
            'videokes', 
            'user'
        ));
    }

    public function preview(User $user)
    {
        $videokes = Videoke::all();

        $anotherHalf = auth()->user()->another_reservation()->where([['is_paid', 'Half Payment'], ['is_return', 'Operating']])->get();

        return view('users.accounts.preview', compact(
            'anotherHalf', 
            'videokes', 
            'user'
        ));
    }
    
    public function expired(User $user)
    {
        return view('pages.status', compact('user'));
    }
}
