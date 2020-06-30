<?php

namespace App\Http\Middleware;

use App\Http\Traits\ChecksCrawler;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use GuzzleHttp\Client;
/**
 * Class TrackBouts
 *
 * @package App\Http\Middleware
 */
class TrackBout {

    use ChecksCrawler;

    /**
     * @var Bout $currentBout
     */
    private static $currentBout = null;
    private static $cookiesEnabled = true;
    private static $timeout;

    const REDIRECT_PARAM = ['mt' => true];
    const NO_TRACKING = ['notrack' => true];

    /**
     * Handle an incoming request.
     *
     * @param  Request $request
     * @param  \Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (!$this->shouldTrack()) {
            //Don't track
            return $next($request);
        }

        //If this request has a bout id, we are all good
        if ($request->hasCookie('_bid')) {
            //make request 
            $input['cookie'] = $request->hasCookie('_bid');
            try {
                $client = new Client();
                $headers = [
                    'API-Key' => env('API_KEY')
                ];

                $url = config('app.naijacrawl_api') . '/track';
                $response = $client->request('GET', $url, [
                    'headers' => $headers,
                    'query' => $input
                ]);

                $res = json_decode($response->getBody());
                $bout = $res;
                //If the bout id does not exist, we will skip
                //this step and create on instead
                if (is_object($bout)) {
                    self::$currentBout = $bout;
                    return $this->run($request, $next, $bout);
                }
            } catch (\GuzzleHttp\Exception\RequestException $res) {

                if ($res->hasResponse()) {
                    $response = $res->getResponse();
                    if ($response->getStatusCode() == 500) {
                        abort(500);
                    }
                    if ($response->getStatusCode() == 404) {
                        abort(404);
                    }
                }
            }
        }
        //Simte the bout id does not exist, we check if
        //we have tried setting a cookie before
        elseif (!$request->hasCookie('__mt')) {
            if ($request->exists(array_keys(self::REDIRECT_PARAM)[0])) {
                self::$cookiesEnabled = false;
            } else {
                //Set cookie and redirect to confirm cookie was set
                setcookie('__mt', 1);
                try {
                    die(header("Location: " . $request->fullUrlWithQuery(self::REDIRECT_PARAM)));
                } catch (\Exception $e) {
                    $params = array_merge($_GET, self::REDIRECT_PARAM);
                    die(header("Location: " . url()->current() . '?' . http_build_query($params)));
                }
            }
        }

        $bout = $this->makeBout($request);
        return $this->run($request, $next, $bout);
    }

    /**
     * @param  Request $request
     *
     * @return Bout
     */
    private function makeBout($request) {
        $input['ip'] = $request->getClientIp();
        $input['user_agent'] = $request->server('HTTP_USER_AGENT');
        //Try fetching bout for this ip and user agent within the bout timeout
        //incase user has deleted cookie

        $input['t'] = $this->getTimeout();
        $t = $this->getTimeout();
        $input['timeoutStart'] = Carbon::now()->addMinute(-$t);
        $input['footprint'] = $this->footprint($request);
        $input['path'] = $request->server('HTTP_REFERER');

        try {
            $client = new Client();
            $headers = [
                'API-Key' => env('API_KEY')
            ];

            $url = config('app.naijacrawl_api') . '/track-save';
            $response = $client->request('GET', $url, [
                'headers' => $headers,
                'query' => $input
            ]);

            $res = json_decode($response->getBody());
            $bout = $res;

            return self::$currentBout = $bout;
        } catch (\GuzzleHttp\Exception\RequestException $res) {

            if ($res->hasResponse()) {
                $response = $res->getResponse();
                if ($response->getStatusCode() == 500) {
                    abort(500);
                }
                if ($response->getStatusCode() == 404) {
                    abort(404);
                }
            }
        }
    }

    private function run(Request $request, $next, $bout) {
        /**
         * @var Response $response
         */
        $response = $next($request);
        $cookie = Cookie::make('_bid', $bout->id, $this->getTimeout());
        $responseWithCookie = $this->attachCookie($response, $cookie);
        if (!$request->hasCookie('_bsign')) {
            $cookie = Cookie::forever('_bsign', $bout->footprint);
            $responseWithCookie = $this->attachCookie($responseWithCookie, $cookie);
        }

        return $responseWithCookie;
    }

    public function terminate($request, $response) {
        $bout = self::$currentBout;
        $token = session('token');
        try {
            if (!empty($token)) {
                if ($this->shouldTrack() && is_object($bout)) {
                  
                    $input['id'] = $bout->id;
                    $client = new Client();
                    $headers = [
                        'API-Key' => env('API_KEY'),
                        'Authorization' => $token
                    ];
               
                    $url = config('app.naijacrawl_api') . '/track-user';
                    $response = $client->request('GET', $url, [
                        'headers' => $headers,
                        'query' => $input
                    ]);
                    $res = json_decode($response->getBody());
                    $bout = $res;
                
                }
            }
        } catch (\GuzzleHttp\Exception\RequestException $res) {

            if ($res->hasResponse()) {
                $response = $res->getResponse();
                if ($response->getStatusCode() == 500) {
                    abort(500);
                }
                if ($response->getStatusCode() == 404) {
                    abort(404);
                }
            }
        }
    }

    /**
     * @param $response
     * @param $cookie
     *
     * @return mixed
     */
    private function attachCookie($response, $cookie) {
        if (method_exists($response, 'withCookie')) {
            return $response->withCookie($cookie);
        }

        return $response;
    }

    private function getTimeout() {
        if (empty(self::$timeout)) {
            //Set timeout (in minutes)
            self::$timeout = env('BOUT_TIMEOUT', 10080) ?: 10080;
        }
        return self::$timeout;
    }

    /**
     * @return Bout
     */
    public static function getCurrentBout() {
        return self::$currentBout;
    }

    /**
     * Get the id of the current bout
     * @return int
     */
    public static function getBoutID() {
        $bout = self::getCurrentBout();
        return $bout ? $bout->id : null;
    }

    /**
     * @param  Request $request
     *
     * @return string
     */
    private function footprint(Request $request) {
        return $request->hasCookie('_bsign') ? $request->cookie('_bsign') : md5(uniqid());
    }

    public static function cookieEnabled() {
        return self::$cookiesEnabled;
    }

    private function shouldTrack() {
        $crawler = $this->isCrawler() && !env('BOUT_TRACK_CRAWLERS', false);
        $notrack = request()->has(array_keys(self::NO_TRACKING)[0]);
        $testing = app()->environment() === 'testing';
        return !$crawler && !$notrack && !$testing;
    }

}
