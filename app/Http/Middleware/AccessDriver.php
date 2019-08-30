<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class AccessDriver
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
        // User role
        $role = Auth::user()->role->name;

        if(Auth::user()->hasRole('driver')){
            return $next($request);
        }

        return redirect('/'.$role);
    }
}
