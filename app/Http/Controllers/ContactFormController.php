<?php

namespace App\Http\Controllers;

use App\User;
use App\Videoke;
use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function __construct()
    {
        $this->middleware('customer')->except('store');
    }
    
    public function create(User $user)
    {
        $videokes = Videoke::all();

        return view('users.accounts.writemessage', compact('videokes', 'user'));
    }

    public function store()
    {
        $data = request()->validate([
            'message' => 'required'
        ]);

        Mail::to('videoke-rental@gmail.com')->send(new ContactFormMail($data));

        return redirect('/user/' . auth()->user()->id . '/account/writemessage')->with('message', 'Thanks for your message. We\'ll be in touch.');
    }
}
