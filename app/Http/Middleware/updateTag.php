<?php

namespace App\Http\Middleware;

use Closure;

class updateTag {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
      //  \Artisan::call('schedule:run');
        return $next($request);
    }

}
