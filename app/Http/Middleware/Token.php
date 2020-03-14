<?php

namespace App\Http\Middleware;

use Closure;

class Token
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
        if(session()->has('token')) {
            return $next($request);    
        } else {
            return response('Unauthorized.', 401);
            //OR return redirect()->guest('/');
        }
    }
}
