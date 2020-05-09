<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class UserHomeController extends Controller {

    public function index() {
        $token = Session::get('token');
        try {
            $client = new Client();
            $headers = [
                'Authorization' => $token,
                'Content-Type' => 'application/x-www-form-urlencoded',
                'Accept' => 'application/json',
                'API-Key' => env('API_KEY')
            ];
            $url = config('app.naijacrawl_api') . '/get_storage';
            $response = $client->request('GET', $url, [
                'headers' => $headers
            ]);

            $res = json_decode($response->getBody());
            $data['storages'] = $res->data->storage;
            $data['user_storages'] = $res->data->user_storage;

            return view('users.add-storage', $data);
        } catch (RequestException $res) {
            return [
                'status' => 422,
                'message' => 'Server Busy',
            ];
        }
    

        return view('users.dashboard');
    }

    public function addStorage() {
        $token = Session::get('token');
        try {
            $client = new Client();
            $headers = [
                'Authorization' => $token,
                'Content-Type' => 'application/x-www-form-urlencoded',
                'Accept' => 'application/json',
                'API-Key' => env('API_KEY')
            ];
            $url = config('app.naijacrawl_api') . '/get_storage';
            $response = $client->request('GET', $url, [
                'headers' => $headers
            ]);

            $res = json_decode($response->getBody());
            $data['storages'] = $res->data->storage;
            $data['user_storages'] = $res->data->user_storage;

            return view('users.add-storage', $data);
        } catch (RequestException $res) {
            return [
                'status' => 422,
                'message' => 'Server Busy',
            ];
        }
    }

    public function PostDrive(Request $request) {
        $input = $request->all();


        try {
            $token = Session::get('token');
            $client = new Client();
            $headers = [
                'Authorization' => $token,
                'Content-Type' => 'application/x-www-form-urlencoded',
                'Accept' => 'application/json',
                'API-Key' => env('API_KEY')
            ];

            $url = config('app.naijacrawl_api') . '/get_drive';
            $response = $client->request('POST', $url, [
                'headers' => $headers,
                'query' => $input
            ]);

            $res = json_decode($response->getBody());

//            if ($res->status == 455) {
//                abort(455);
//            }
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

    public function postStorage(Request $request) {
        $input = $request->all();


        try {
            $token = Session::get('token');
            $client = new Client();
            $headers = [
                'Authorization' => $token,
                'Content-Type' => 'application/x-www-form-urlencoded',
                'Accept' => 'application/json',
                'API-Key' => env('API_KEY')
            ];

            $url = config('app.naijacrawl_api') . '/get_storage';
            $response = $client->request('POST', $url, [
                'headers' => $headers,
                'query' => $input
            ]);

            $res = json_decode($response->getBody());

//            if ($res->status == 455) {
//                abort(455);
//            }
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
