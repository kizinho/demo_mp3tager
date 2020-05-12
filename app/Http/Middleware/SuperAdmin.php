<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Client;

class SuperAdmin {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $token = session('token');
        $headers = [
            'Authorization' => $token
        ];
        $client = new Client();
        $url = config('app.naijacrawl_api') . '/token';
        $response = $client->request('GET', $url, [
            'headers' => $headers
        ]);

        $res = json_decode($response->getBody());
        $array = $res->data->roles;
        $string = 'SuperAdmin';
        foreach ($array as $value) {
            if (strpos($string, $value->name) !== FALSE) {
                return $next($request);
            }
        }
        return redirect('/dashboard');
    }

}
