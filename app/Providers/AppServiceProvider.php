<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;

class AppServiceProvider extends ServiceProvider {

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        Schema::defaultStringLength(191);
        date_default_timezone_set('Africa/Lagos');
        view()->composer('*', function ($token) {
            $token = session('token');
            if (empty($token)) {
                View::share('user', false);
            } else {
                if (Cache::has($token)) {
                    $res = Cache::get($token);
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
                    View::share('user', false);
                } else {

                    View::share('user', $res->data);
                }
            }
        });
    }

}
