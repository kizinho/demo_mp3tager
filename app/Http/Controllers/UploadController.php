<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\File;

class UploadController extends Controller {

    public function index() {
        return view('pages.upload');
    }

    public function store(Request $request) {
        $files = $request->file('file');
        try {
            $output = [];
            foreach ($files as $key => $value) {
                if (!is_array($value)) {
                    $output[] = [
                        'name' => 'file[]',
                        'contents' => fopen($value->getPathname(), 'r'),
                        'filename' => $value->getClientOriginalName()
                    ];
                    continue;
                }
            }

//            $output [] = [
//                'name' => 'field_name',
//                'contents' => \request()->get('field_name')
//            ];
//
//            $output [] = [
//                'name' => 'field_name_2',
//                'contents' => \request()->get('field_name_2')
//            ];
//            $output [] = [
//                'name' => 'field_name_3',
//                'contents' => \request()->get('field_name_3')
//            ];

            $url = config('app.naijacrawl_api') . '/upload-tag';
            $client = new Client();
            $response = $client->request('POST', $url, [
                'headers' => [
                    'Authorization' => '',
                    'API-Key' => env('API_KEY')
                ],
                'multipart' => $output
            ]);

            $data = \GuzzleHttp\json_decode($response->getBody());
            return [
                'data' => $data
            ];
        } catch (RequestException $data) {
            return [
                'status' => 422,
                'message' => 'Server Busy',
            ];
        }
    }

    public function tag(Request $request) {
        $data_array = $request->all();
        $output = [];
        foreach ($data_array as $key => $value) {
            if (!is_array($value)) {
                $output[] = [
                    'contents' => $value
                ];
                continue;
            }
        }

        try {
            $client = new Client();
            $headers = [
                'API-Key' => env('API_KEY')
            ];

            $url = config('app.naijacrawl_api') . '/tag-details';
            $response = $client->request('GET', $url, [
                'headers' => $headers,
                'query' => $output
            ]);

            $res = json_decode($response->getBody());
            if ($res->status == 401) {
                session()->flash('message.level', 'error');
                session()->flash('message.color', 'red');
                session()->flash('message.content', 'Invalid Response');
                return redirect()->route('upload');
            }
             return [
                'data' => $res->tags
            ];
            $data['details'] = $res->tags;
           return view('pages.tags',$data);
        } catch (RequestException $res) {
            return [
                'status' => 422,
                'message' => 'Server Busy',
            ];
        }
    }

}
