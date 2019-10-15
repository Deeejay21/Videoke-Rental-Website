<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Payment;
use App\Videoke;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\PhoneFormRequest;

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
        if (auth()->user()->usertype == 'admin')
        {
            return redirect('/admin/customers')->with('success', 'Customer has been added.');
        }
        else
        {
            return '/user/' . auth()->user()->id . '/account/home';
        }
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
            'first_name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z ]+$/'],
            'last_name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z ]+$/'],
            'checked_in_at' => ['required'], // validator for all of the day reserved
            'videoke_id' => ['required', 'string', 'max:255', 'not_in:0'],
            'payment_id' => ['required', 'string', 'max:255', 'not_in:0'],
            'gender' => ['required', 'string', 'max:255', 'not_in:0'],
            'age' => ['required', 'integer', 'min:18', 'max:70'],
            'phone' => ['required', 'phone:PH'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'first_name.regex' => 'Please avoid using numbers.',
            'last_name.regex' => 'Please avoid using numbers.',
            'age.min' => 'The age must be at least 18 years old.',
            'age.max' => 'The age may not be greater than 70 years old.',
            'phone.phone' => 'The phone format is invalid.',
            'gender.not_in' => 'The gender field is required.',
            'videoke_id.not_in' => 'The videoke field is required.',
            'payment_id.not_in' => 'The payment field is required.',
            'checked_in_at.required' => 'The reservation date field is required.',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function create(array $data)
    {
        return User::create([
            'videoke_id' => $data['videoke_id'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'checked_in_at' => $data['checked_in_at'],
            'gender' => $data['gender'],
            'age' => $data['age'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'payment_id' => $data['payment_id'],
        ]);

        // $data = request()->validate([
        //     'videoke_id' => 'videoke_id',
        //     'first_name' => 'first_name',
        //     'checked_in_at' => 'checked_in_at',
        //     'last_name' => 'last_name',
        //     'gender' => 'gender',
        //     'age' => 'age',
        //     'phone' => 'phone',
        //     'email' => 'email',
        //     'password' => Hash::make('password'),
        //     'payment_id' => 'payment_id',
        // ]);


        // return auth()->user()->account()->create($data);

        // return Address::create([
        //     'line_1' => $data['line_1']
        // ]);
        // return $address->user->create(); DAPAT GANITO
    }

    // public function store()
    // {
    //     $data = request()->validate([
    //         'videoke_id' => 'videoke_id',
    //         'first_name' => 'first_name',
    //         'checked_in_at' => 'checked_in_at',
    //         'last_name' => 'last_name',
    //         'gender' => 'gender',
    //         'age' => 'age',
    //         'phone' => 'phone',
    //         'email' => 'email',
    //         'password' => Hash::make('password'),
    //         'payment_id' => 'payment_id',
    //     ]);


    //     auth()->user()->account()->create($data);

    //     return redirect('/user/' . auth()->user()->id . '/account/home');
    // }

    public function list()
    {
        $videokes = Videoke::all();
        $payments = Payment::all();
        $users = User::where('usertype', 'Half Payment');
        $currentTime = Carbon::now('asia/manila');
        $currentTime = date('F d, Y');

        $date_format = Carbon::now('asia/manila');

        return view('auth.register', compact('payments', 'videokes', 'users', 'currentTime', 'date_format'));
    }
}
