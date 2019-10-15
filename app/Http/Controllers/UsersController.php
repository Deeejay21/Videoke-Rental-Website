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
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function __construct()
    {
        $this->middleware(['auth' => 'verified']);
        $this->middleware(['edit'])->only(['edit']);
        $this->middleware(['customer_status'])->only(['home', 'personalinformation', 'reservation', 'payment']);
        $this->middleware('customer')->except('update');
    }
    
    public function home(User $user)
    {
        // $this->authorize('view', $user->another_reservation);

        // $anotherPaying = AnotherReservation::where([['is_paid', 'Paying'], ['is_return', 'Operating']])->get();

        // $anotherHalf = AnotherReservation::where([['is_paid', 'Half Payment'], ['is_return', 'Operating']])->get();

        // $anotherPaid = AnotherReservation::where([['is_paid', 'Paid'], ['is_return', 'Operating']])->get();

        // $anotherPaidReturn = AnotherReservation::where([['is_paid', 'Paid'], ['is_return', 'Return']])->get();

        // $anotherPaidReturnCount = $anotherPaidReturn->count();

        $anotherPaying = auth()->user()->another_reservation()->where([['is_paid', 'Paying'], ['is_return', 'Operating']])->get();

        $anotherHalf = auth()->user()->another_reservation()->where([['is_paid', 'Half Payment'], ['is_return', 'Operating']])->get();

        $anotherPaid = auth()->user()->another_reservation()->where([['is_paid', 'Paid'], ['is_return', 'Operating']])->get();

        $anotherPaidReturn = auth()->user()->another_reservation()->where([['is_paid', 'Paid'], ['is_return', 'Return']])->get();

        $anotherPaidReturnCount = $anotherPaidReturn->count();

        $videokes = Videoke::all();

        return view('users.accounts.home', compact(
            'videokes', 
            'anotherPaidReturnCount', 
            'anotherPaidReturn', 
            'anotherPaid', 
            'anotherHalf', 
            'anotherPaying', 
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
            'first_name' => 'required|string|max:255|regex:/^[a-zA-Z ]+$/',
            'last_name' => 'required|string|max:255|regex:/^[a-zA-Z ]+$/',
            'age' => 'required|integer|min:18|max:70',
            'phone' => 'required|phone:PH',
            'gender' => 'required|string|max:255|not_in:0',
        ], [
            'first_name.regex' => 'Please avoid using numbers.',
            'last_name.regex' => 'Please avoid using numbers.',
            'age.min' => 'The age must be at least 18 years old.',
            'age.max' => 'The age may not be greater than 70 years old.',
            'phone.phone' => 'The phone format is invalid.',
            'gender.not_in' => 'The gender field is required.',
        ]);

        auth()->user()->update($data);

        return redirect('/user/' . auth()->user()->id . '/account/personalinformation')->with('update', 'Your Personal Information has been updated successfully.');
    }

    public function personalinformation(User $user)
    {
        $videokes = Videoke::all();
        //    $this->authorize('viewAny', User::class);
        $another = auth()->user()->another_reservation()->get();

        $anotherPaying = auth()->user()->another_reservation()->where([['is_paid', 'Paying'], ['is_return', 'Operating']])->get();

        $anotherHalf = auth()->user()->another_reservation()->where([['is_paid', 'Half Payment'], ['is_return', 'Operating']])->get();

        $anotherPaid = auth()->user()->another_reservation()->where([['is_paid', 'Paid'], ['is_return', 'Operating']])->get();

        $anotherOperating = auth()->user()->another_reservation()->where('is_return', 'Operating')->get();

        $anotherPaidReturn = auth()->user()->another_reservation()->where([['is_paid', 'Paid'], ['is_return', 'Return']])->get();

        $anotherPaidReturnCount = $anotherPaidReturn->count();

        $another = $another->count();

        return view('users.accounts.personalinformation', compact('videokes', 'another', 'anotherOperating', 'anotherPaidReturnCount', 'anotherPaidReturn', 'anotherPaid', 'anotherHalf', 'anotherPaying', 'user'));
    }

    public function reservation(User $user)
    {
        $videokes = Videoke::all();

        $anotherPaying = auth()->user()->another_reservation()->where([['is_paid', 'Paying'], ['is_return', 'Operating']])->get();

        return view('users.accounts.reservation', compact('videokes', 'anotherPaying', 'user'));
    }

    public function payment(User $user)
    {
        $videokes = Videoke::all();

        $anotherPaying = auth()->user()->another_reservation()->where([['is_paid', 'Paying'], ['is_return', 'Operating']])->get();

        $anotherHalf = auth()->user()->another_reservation()->where([['is_paid', 'Half Payment'], ['is_return', 'Operating']])->get();

        $anotherPaid = auth()->user()->another_reservation()->where([['is_paid', 'Paid'], ['is_return', 'Operating']])->get();

        $anotherPaidReturn = auth()->user()->another_reservation()->where([['is_paid', 'Paid'], ['is_return', 'Return']])->get();

        $anotherPaidReturnCount = $anotherPaidReturn->count();

        return view('users.accounts.payment', compact('videokes', 'anotherPaidReturnCount', 'anotherPaidReturn', 'anotherPaid', 'anotherHalf', 'anotherPaying', 'user'));
    }

    public function preview(User $user)
    {
        $videokes = Videoke::all();

        $anotherHalf = auth()->user()->another_reservation()->where([['is_paid', 'Half Payment'], ['is_return', 'Operating']])->get();

        return view('users.accounts.preview', compact('videokes', 'anotherHalf', 'user'));
    }
    
    public function expired(User $user)
    {
        return view('pages.status', compact('user'));
    }
}
