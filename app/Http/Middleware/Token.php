<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

class Token {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $token = session('token');
        $userData = session('userData');
        if (Cache::has($userData)) {
            $res = Cache::get($userData);
        } else {
            $headers = [
                'Authorization' => $token
            ];
            $client = new Client();
            $url = config('app.naijacrawl_api') . '/token';
            $response = $client->request('GET', $url, [
                'headers' => $headers
            ]);

            $res = json_decode($response->getBody());
            Cache::put($userData, $res, 525600);
        }
        if (empty($res)) {
            $userData = session('userData');
            Cache::forget($userData);
            session()->forget('token');
            session()->forget('userData');
            return redirect('/signin');
        }
        return $next($request);
    }

}
