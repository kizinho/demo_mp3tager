<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class AuthController extends Controller {

    public function __construct() {

        $this->middleware('login');
    }

    public function signUp(Request $request) {
        $ref = $request->ref;
        if (!empty($ref)) {
            $data['ref'] = $request->ref;
        } else {
            $data['ref'] = null;
        }
        return view('pages.signup', $data);
    }

    public function signIn() {
        return view('pages.signin');
    }

    public function signUpCreate(Request $request) {
        $input = $request->all();
        try {
            $client = new Client();
            $headers = [
                'API-Key' => env('API_KEY')
            ];

            $url = config('app.naijacrawl_api') . '/register';
            $response = $client->request('POST', $url, [
                'headers' => $headers,
                'query' => $input
            ]);

            $res = json_decode($response->getBody());
            if ($res->status == 200) {
                $token = $res->token->user;
                session(['token' => $token]);
                session()->flash('login.content', 'Welcome');
            }
            return [
                'data' => $res
            ];
        } catch (RequestException $res) {
            return [
                'status' => 422,
                'message' => 'Server Busy',
            ];
        }
    }

    public function signInPost(Request $request) {

        $input = $request->all();
        try {
            $client = new Client();
            $headers = [
                'API-Key' => env('API_KEY')
            ];

            $url = config('app.naijacrawl_api') . '/login';
            $response = $client->request('POST', $url, [
                'headers' => $headers,
                'query' => $input
            ]);

            $res = json_decode($response->getBody());
            if ($res->status == 200) {
                $token = $res->token->user->token;
                session(['token' => $token]);
            }
            session()->flash('login.content', 'Welcome');
            return [
                'data' => $res
            ];
        } catch (RequestException $res) {
            return [
                'status' => 422,
                'message' => 'Server Busy',
            ];
        }
    }

}
