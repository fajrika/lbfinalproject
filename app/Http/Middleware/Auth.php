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
    public function handle($request, Closure $next, $role = null)
    {        
        if (session('auth.username')) {
            // if (Route::currentRouteName() == 'login')
            //     return redirect('/dashboard');
            if(session('auth.roleName') == $role || $role == null)
                return $next($request);
        }
         elseif (Route::currentRouteName() == 'login') {
            return $next($request);
        }
        return redirect('/login');
    }
}
