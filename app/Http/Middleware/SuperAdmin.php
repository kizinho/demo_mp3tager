<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Cache;
use Closure;

class SuperAdmin {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $token = $request->session()->get('token');
        $check = Cache::get($token);
        dd($check);
        $array = $check->data->roles;
        $string = 'SuperAdmin';
        foreach ($array as $value) {
            if (strpos($string, $value->name) !== FALSE) {
                return $next($request);
            }
        }
        return redirect('/dashboard');
    }

}
