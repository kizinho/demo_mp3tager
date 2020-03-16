<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\File;

class UploadController extends Controller {

    public function index(Request $request) {
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

            $data['details'] = $res->tags;
            return view('pages.tags', $data);
        } catch (RequestException $res) {
            return [
                'status' => 422,
                'message' => 'Server Busy',
            ];
        }
    }

    public function tagPost(Request $request) {
        $leads = $request->all();
        dd($leads);
  $rows = [];
  foreach($leads as $key=> $input) {
    array_push($rows, [
      'title' => isset($title[$key]) ? $leads[$key] : '', //add a default value here
      'album' => isset($album[$key]) ? $album[$key] : '' //add a default value here
    ]);
  }
        dd($rows);
    }

}
