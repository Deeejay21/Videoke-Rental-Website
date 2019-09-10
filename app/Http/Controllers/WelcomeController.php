<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Videoke;
use App\VideokeTotal;

class WelcomeController extends Controller
{
    public function index()
    {
        $videokes = Videoke::all();

        $users = User::all()->where('is_paid', 'Paid')->count();

        $videoke_totals = VideokeTotal::all()->count();

        return view('pages.welcome', compact('users', 'videoke_totals', 'videokes'));
    }
}
