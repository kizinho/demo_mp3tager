<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;

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
        if ($request->q) {
            $input['url_path'] = url('my-files?q=' . $request->q);
        } elseif ($request->tab) {
            $input['url_path'] = url('my-files?tab=' . $request->tab);
        } elseif ($request->type) {
            $input['url_path'] = url('my-files?type=' . $request->type);
        } else {
            $input['url_path'] = url('my-files');
        }
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
            //dd($res);
            $data['task'] = $res->data->task;
            $data['tab'] = $res->data->tab;
            $data['search'] = $res->data->search;
            $data['type'] = $res->data->type;
            return view('users.my-files', $data);
        } catch (RequestException $res) {
            return [
                'status' => 422,
                'message' => 'Server Busy',
            ];
        }
    }

    //discover
    public function discover(Request $request) {
        $input = $request->all();
        if ($request->q) {
            $input['url_path'] = url('discover?q=' . $request->q);
        } elseif ($request->tab) {
            $input['url_path'] = url('discover?tab=' . $request->tab);
        } elseif ($request->type) {
            $input['url_path'] = url('discover?type=' . $request->type);
        } else {
            $input['url_path'] = url('discover');
        }
        $token = Session::get('token');
        try {
            $client = new Client();
            $headers = [
                'Authorization' => $token,
                'Content-Type' => 'application/x-www-form-urlencoded',
                'Accept' => 'application/json',
                'API-Key' => env('API_KEY')
            ];
            $url = config('app.naijacrawl_api') . '/get_discover';
            $response = $client->request('GET', $url, [
                'headers' => $headers,
                'query' => $input
            ]);

            $res = json_decode($response->getBody());
            $data['task'] = $res->data->task;
            $data['search'] = $res->data->search;
            $data['type'] = $res->data->type;
            return view('users.discover', $data);
        } catch (RequestException $res) {
            return [
                'status' => 422,
                'message' => 'Server Busy',
            ];
        }
    }
 //all files

    public function allFile(Request $request) {
        $input = $request->all();
        if ($request->q) {
            $input['url_path'] = url('all-files?q=' . $request->q);
        } elseif ($request->tab) {
            $input['url_path'] = url('all-files?tab=' . $request->tab);
        } elseif ($request->type) {
            $input['url_path'] = url('all-files?type=' . $request->type);
        } else {
            $input['url_path'] = url('all-files');
        }
        $token = Session::get('token');
        try {
            $client = new Client();
            $headers = [
                'Authorization' => $token,
                'Content-Type' => 'application/x-www-form-urlencoded',
                'Accept' => 'application/json',
                'API-Key' => env('API_KEY')
            ];
            $url = config('app.naijacrawl_api') . '/get_files_all';
            $response = $client->request('GET', $url, [
                'headers' => $headers,
                'query' => $input
            ]);

            $res = json_decode($response->getBody());
            //dd($res);
            $data['task'] = $res->data->task;
            $data['tab'] = $res->data->tab;
            $data['search'] = $res->data->search;
            $data['type'] = $res->data->type;
            return view('users.all-files', $data);
        } catch (RequestException $res) {
            return [
                'status' => 422,
                'message' => 'Server Busy',
            ];
        }
    }
    public function myDelete(Request $request) {
        $input = $request->all();
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
            $response = $client->request('DELETE', $url, [
                'headers' => $headers,
                'query' => $input
            ]);

            $res = json_decode($response->getBody());
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

    public function logout() {
        $token = session('token');
        Cache::forget($token);
        session()->forget('token');
        session()->flush();
        session()->flash('message.verify', 'success');
        session()->flash('message.content', 'You have been succesfully logged out! , lets see you back again');
        return redirect('signin');
    }

}
