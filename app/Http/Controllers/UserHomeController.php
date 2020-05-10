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
            $url = config('app.naijacrawl_api') . '/get_dashboard';
            $response = $client->request('GET', $url, [
                'headers' => $headers
            ]);

            $res = json_decode($response->getBody());
            //  dd($res);
            $data['user_storages'] = $res->data->user_storage;
            $data['user_spaces'] = $res->data->user_space;
            $data['user_spaces_string'] = $res->data->user_space_string;
            $data['user_load_space'] = $res->data->user_load_space;
            $data['user_ex'] = $res->data->user_ex_name;
            $data['user_ex_size'] = $res->data->user_ex_size;
            $data['pending_task'] = $res->data->pending_task;
            $data['completed_task'] = $res->data->completed_task;
            $data['total_task'] = $res->data->total_task;
            $data['recent_task'] = $res->data->recent_task;
            return view('users.dashboard', $data);
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

    //my files

    public function myFile(Request $request) {
        $input = $request->all();
        $input['url_path'] = url('my-files');
        $token = Session::get('token');
        try {
            $client = new Client();
            $headers = [
                'Authorization' => $token,
                'Content-Type' => 'application/x-www-form-urlencoded',
                'Accept' => 'application/json',
                'API-Key' => env('API_KEY')
            ];
            $url = config('app.naijacrawl_api') . '/get_files';
            $response = $client->request('GET', $url, [
                'headers' => $headers,
                'query' => $input
            ]);

            $res = json_decode($response->getBody());
            $data['task'] = $res->data->task;
            //dd($data);
            return view('users.my-files', $data);
        } catch (RequestException $res) {
            return [
                'status' => 422,
                'message' => 'Server Busy',
            ];
        }


        return view('users.dashboard');
    }

}