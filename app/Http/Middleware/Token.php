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
        if (Cache::has($token)) {
            $headers = [
                'Authorization' => $token
            ];
            $client = new Client();
            $url = config('app.naijacrawl_api') . '/token';
            $response = $client->request('GET', $url, [
                'headers' => $headers
            ]);
            $r = json_decode($response->getBody());
            if(empty($r)){
              Cache::forget($token);   
            }
            else {
              $res = Cache::get($token);   
            }
            
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
            Cache::put($token, $res, 525600);
        }
        if (empty($res)) {
            Cache::forget($token);
            return redirect('/signin');
        } else {
            return $next($request);
        }
    }

}
