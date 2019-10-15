<?php

namespace App\Http\Middleware;

use Closure;

class AnotherReservationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // if (auth()->user()->another_reservation->is_return == 'Return' && auth()->user()->another_reservation->is_paid == 'Paid') {
        //     return $next($request);
        // } else {
        //     return redirect('/user/' . auth()->user()->id . '/account/home');
        // }
    }
}
