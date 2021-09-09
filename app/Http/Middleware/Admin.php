<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class Admin
{

    protected $notAdminRedirectRouteName = "user.dashboard";
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if($request->user()->role->name != User::ADMIN) {
            return redirect()->route($this->notAdminRedirectRouteName);
        }
        return $next($request);

    }
}
