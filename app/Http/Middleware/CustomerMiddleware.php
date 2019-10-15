<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CustomerMiddleware
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
        $id = request()->route('user')->id;

        if ($id == Auth::id()) {
            return $next($request);
        }
            return redirect('/user/' . auth()->user()->id . '/account/home');
    }
}
