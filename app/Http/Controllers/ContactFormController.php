<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use App\User;

class ContactFormController extends Controller
{
    public function create(User $user)
    {
        return view('users.accounts.writemessage', compact('user'));
    }

    public function store()
    {
        $data = request()->validate([
            'message' => 'required'
        ]);

        // auth()->user()->create($data);

        Mail::to('videoke-rental@gmail.com')->send(new ContactFormMail($data));

        return redirect('/user/' . auth()->user()->id . '/account/writemessage')->with('message', 'Thanks for your message. We\'ll be in touch.');
    }
}
