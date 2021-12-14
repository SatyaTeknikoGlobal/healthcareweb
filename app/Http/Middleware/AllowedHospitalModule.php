<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

use App\Helpers\CustomHelper;

class AllowedHospitalModule{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $moduleName){

        $HOSADMIN_ROUTE_NAME = config('custom.HOSADMIN_ROUTE_NAME');

        if(!CustomHelper::isHosAllowedModule($moduleName)){
            if (Auth::check()) {
                return redirect(url($HOSADMIN_ROUTE_NAME));
            }
            return redirect(url('/'));
        }

        return $next($request);
    }
}
