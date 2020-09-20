<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;

class Auth
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
        if (session('auth.username')) {
            if (Route::currentRouteName() == 'login')
                return redirect('/dashboard');
            return $next($request);
        } elseif (Route::currentRouteName() == 'login') {
            return $next($request);
        }
        return redirect('/login');
    }
}
