<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail1;
use App\Videoke;

class ContactFormController1 extends Controller
{
    public function create()
    {
        $videokes = Videoke::all();

        return view('pages.welcome', compact('videokes'));
    }

    public function store()
    {
        $data = request()->validate([
            'name'      => 'required',
            'email'     => 'email|required',
            'message'   => 'required',
        ]);

        Mail::to('videoke-rental@gmail.com')->send(new ContactFormMail1($data));
        
        return redirect('#contact')->with('message', 'Thanks for your message. We\'ll be in touch.');
    }
}
