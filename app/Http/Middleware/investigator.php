<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class investigator
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
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $roles = Auth::user()->roles()->get();

        foreach ($roles as $role){
            if ($role["role"] == "INVESTIGATOR") {
                return $next($request);
            }
        }

        abort(403);
    }
}
