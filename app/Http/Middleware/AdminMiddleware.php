<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
        if (auth()->user()->usertype == 'Admin')
        {
            return $next($request);
        }
        else 
        {
            return redirect('/user/' . auth()->user()->id . '/account/home');
        }

        // if (auth()->user()->usertype == 'admin')
        // {
        //     return $next($request);
        // }
        // elseif (auth()->user()->usertype == '0')
        // {
        //     return redirect('/user/' . auth()->user()->id . '/account/home');
        // }
        // elseif (auth()->guest())
        // {
        //     return $next($request);
        // }
    }
}
