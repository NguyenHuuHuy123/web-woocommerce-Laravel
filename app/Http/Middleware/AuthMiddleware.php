<?php

namespace App\Http\Middleware;
use Session;
use Closure;
session_start();

class AuthMiddleware
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
        $dieuKien = Session::get("admin_id");
        if($dieuKien){
            return $next($request);
        } else {
            return redirect("/login");
        }
    }
}
