<?php

namespace App\Http\Controllers;

use App\User;
use App\Videoke;
use App\Payment;
use App\VideokeTotal;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function index()
    {
        $videokes = Videoke::all();
        
        return view('pages.pricing.index', compact('videokes'));
    }

    public function show(Videoke $videoke)
    {
        $users = User::whereIn('is_paid', ['Half Payment', 'Paid'])
            ->where('is_return', 'Operating')
            ->get();

        $videokes = Videoke::all();

        $payments = Payment::all();
        // $startTime = strtotime( '2010-05-01 12:00' );
        // $endTime = strtotime( '2010-05-10 12:00' );
        
        // // Loop between timestamps, 24 hours at a time
        // for ( $i = $startTime; $i <= $endTime; $i = $i + 86400 ) {
        //   $thisDate = date( 'Y-m-d', $i ); // 2010-05-01, 2010-05-02, etc
        // }

        $videokeTotal = VideokeTotal::all()->count();

        $userTotal = User::where('is_return', 'Operating')
            ->whereIn('is_paid', ['Half Payment', 'Paid'])
            ->count();

        return view('pages.pricing.show', compact(
            'videokeTotal', 
            'userTotal', 
            'videoke', 
            'payments', 
            'users', 
            'videokes'
        ));
    }
}
