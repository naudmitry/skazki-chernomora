<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticateGuest
{

    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check())
        {
            return $next($request);
        }

        if (Auth::guard('web-guest')->check())
        {
            return $next($request);
        }

//        $user = User::create([
//            'is_temporary' => true,
//        ]);
//
//        Auth::guard('web-guest')->login($user, true);

        return $next($request);
    }
}