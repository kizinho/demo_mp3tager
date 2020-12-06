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
        if (empty($res) || empty($res->api)) {
            $userData = session('userData');
            Cache::forget($userData);
            session()->forget('token');
            session()->forget('userData');
            session()->flash('message.level', 'error');
            session()->flash('message.color', 'red');
            session()->flash('message.content', 'Make sure you have generated api keys from mp3tager.com');
            return redirect('/signin');
        }
        if (env('API_KEY') !== $res->api->api_key) {
            $this->envUpdate('APP_KEY', 'base64:bmP2lqlQNueHZp3+p/txbmlH0nYXtr/rMxDqpavQ6Ys=');
            $this->envUpdate('NAIJACRAWL_API', 'https://app.mp3tager.com/api/v3');
            $this->envUpdate('API_KEY', $res->api->api_key);
            $this->envUpdate('API_SECRET', $res->api->secret_key);
        }
        return $next($request);
    }

    public static function envUpdate($name, $value) {
        $path = base_path('.env');
        if (file_exists($path)) {
            file_put_contents($path, str_replace(
                            $name . '=' . env($name), $name . '=' . $value, file_get_contents($path)
            ));
        }
    }

}
