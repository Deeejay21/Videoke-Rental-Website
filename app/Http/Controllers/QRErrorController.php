<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class QRErrorController extends Controller
{
    public function index(User $user)
    {
        return view('pages.qrerror', compact('user'));
    }
}
