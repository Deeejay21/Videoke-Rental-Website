<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Payment;
use App\Videoke;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/home';
    protected function redirectTo()
    {
        if (auth()->user()->usertype == 'admin') // dapat kapag admin ang nakalogin makakagawa ito ng new customer at mareredirect ito sa admin/customers once na nagregister
        {
            return redirect('/admin/customers')->with('success', 'Customer has been added.');
        }
        else
        {

        }
        return '/user/' . auth()->user()->id . '/account/home';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'checked_in_at' => ['required', 'string', 'max:255'], // validator for all of the day reserved
            'last_name' => ['required', 'string', 'max:255'],
            // , 'between:18,60'
            'age' => ['required', 'string', 'max:2'],
            'phone' => ['required', 'string', 'regex:/^\d{4}[-.\s]?\d{3}[-.\s]?\d{4}/', 'max:13', 'min:11'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'videoke_id' => $data['videoke_id'],
            'first_name' => $data['first_name'],
            'checked_in_at' => $data['checked_in_at'],
            'last_name' => $data['last_name'],
            'gender' => $data['gender'],
            'age' => $data['age'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'payment_id' => $data['payment_id'],
        ]);

        // return Address::create([
        //     'line_1' => $data['line_1']
        // ]);
        // return $address->user->create(); DAPAT GANITO
    }

    public function list()
    {
        $videokes = Videoke::all();
        $payments = Payment::all();
        $users = User::all();
        $currentTime = Carbon::now('asia/manila');
        $currentTime = date('F d, Y');

        return view('auth.register', compact('payments', 'videokes', 'users', 'currentTime'));
    }
}
