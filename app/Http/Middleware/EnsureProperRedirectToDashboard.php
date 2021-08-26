<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureProperRedirectToDashboard
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
        if (Auth::check()) {
            if($request->user()->role->name != "admin") {
                return redirect()->route("user.dashboard");
            } else {
                return redirect()->route("admin.dashboard");
            }
        }
        return $next($request);
    }
}
