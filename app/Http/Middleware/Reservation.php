<?php

namespace App\Http\Middleware;

use Closure;

class Reservation
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
        if (auth()->user()->is_return == 'Return' && auth()->user()->is_paid == 'Paid') {
            return $next($request);
        } else {
            return redirect('/user/' . auth()->user()->id . '/account/home');
        }
    }
}
