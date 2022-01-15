<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthHospital{
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = "hospital"){

        $HOSADMIN_ROUTE_NAME = config('custom.HOSADMIN_ROUTE_NAME');
        // prd(Auth::guard($guard)->check());
        if (!Auth::guard($guard)->check()) {
            return redirect($HOSADMIN_ROUTE_NAME.'/login');
        }
        return $next($request);
    }
}
