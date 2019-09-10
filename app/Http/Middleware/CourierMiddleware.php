<?php

namespace App\Http\Middleware;

use Closure;

class CourierMiddleware
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
        if (auth()->user()->usertype == 'Courier')
        {
            return $next($request);
        }
        else
        {
            return redirect('/user/' . auth()->user()->id . '/account/home');
        }
    }
}
