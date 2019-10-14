<?php

namespace App\Http\Middleware;

use Closure;

class EditCustomerReservationMiddleware
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
        if (auth()->user()->is_return == 'Operating' && auth()->user()->is_paid == 'Paying') {
            return $next($request);
        } else {
            return redirect('/user/' . auth()->user()->id . '/account/home');
        }
    }
}
