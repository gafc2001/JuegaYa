<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        error_log("profile");
        if(!is_null(Auth::user())){
            error_log("auth");
            if(is_null(Auth::user()->profile())){
                error_log("profile.create");
                return redirect()->route('profile.create');
            }
        }
        return $next($request);
    }
}
