<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;

class UploadController extends Controller {

    public function index(Request $request) {
        if (Cache::has('countupload')) {
            $res = Cache::get('countupload');
        } else {
            $headers = [
                'API-Key' => env('API_KEY')
            ];
            $client = new Client();
            $url = config('app.naijacrawl_api') . '/get_count';
            $response = $client->request('GET', $url, [
                'headers' => $headers
            ]);

            $res = json_decode($response->getBody());
            Cache::put('countupload', $res, 525600);
        }

        $data['count_upload'] = $res->data;
        return view('pages.upload', $data);
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

    public function storeLink(Request $request) {
        $input = $request->all();
        try {
            $headers = [
                'API-Key' => env('API_KEY')
            ];
            $url = config('app.naijacrawl_api') . '/upload-tag-link';
            $client = new Client();
            $response = $client->request('POST', $url, [
                'headers' => $headers,
                'query' => $input
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

            if ($res->status == 455) {
                abort(455);
            }

            $data['details'] = $res->tags;

            Cache::forget('countupload');
            return view('pages.tags', $data);
        } catch (RequestException $res) {
            return [
                'status' => 422,
                'message' => 'Server Busy',
            ];
        }
    }

    public function tagPost(Request $request) {
        $input = $request->all();
        if ($request->hasFile('viocetag')) {
            $voicetags = $request->file('viocetag');
            $output = [];
            foreach ($voicetags as $key => $value) {
                if (!is_array($value)) {
                    $output[] = [
                        'name' => 'voicetag[' . $key . ']',
                        'contents' => fopen($value->getPathname(), 'r'),
                        'filename' => $value->getClientOriginalName()
                    ];
                    continue;
                }
            }
        }
        if ($request->hasFile('coverart')) {
            $coverarts = $request->file('coverart');
            foreach ($coverarts as $keyt => $cover) {
                if (!is_array($cover)) {
                    $output[] = [
                        'name' => 'coverart[' . $keyt . ']',
                        'contents' => fopen($cover->getPathname(), 'r'),
                        'filename' => $cover->getClientOriginalName()
                    ];
                    continue;
                }
            }
        }
        if ($request->hasFile('watermark_image')) {
            $watermark_image = $request->file('watermark_image');
            foreach ($watermark_image as $keyt => $water) {
                if (!is_array($water)) {
                    $output[] = [
                        'name' => 'watermark_image[' . $keyt . ']',
                        'contents' => fopen($water->getPathname(), 'r'),
                        'filename' => $water->getClientOriginalName()
                    ];
                    continue;
                }
            }
        }

        $output [] = [
            'name' => 'data',
            'contents' => json_encode(
                    [
                        'id' => $request->id,
                        'joinSelect' => $request->joinSelect,
                        'title' => $request->title,
                        'artist' => $request->artist,
                        'album' => $request->album,
                        'track_number' => $request->track_number,
                        'genre' => $request->genre,
                        'comments' => $request->comments,
                        'year' => $request->year,
                        'publisher' => $request->publisher,
                        'encoded_by' => $request->encoded_by,
                        'composer' => $request->composer,
                        'encoder_settings' => $request->encoder_settings,
                        'path' => $request->path,
                        'user_id' => $request->user_id,
                        'saveData' => $request->saveData,
                        'watermark' => $request->watermark,
                        'watermark_text' => $request->watermark_text,
                        'watermark_color' => $request->watermark_color,
                        'watermark_font' => $request->watermark_font,
                        'ps' => $request->ps,
                        'extension' => $request->extension
                    ]
            ),
        ];


        try {
            $client = new Client();
            $headers = [
                'API-Key' => env('API_KEY')
            ];

            $url = config('app.naijacrawl_api') . '/save-tag';
            $response = $client->request('POST', $url, [
                'headers' => $headers,
                'multipart' => $output
            ]);

            $res = json_decode($response->getBody());
            //dd($res);
            if ($res->status == 401) {
                session()->flash('message.level', 'error');
                session()->flash('message.color', 'red');
                session()->flash('message.content', 'Invalid Response');
                return redirect()->route('upload');
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

    public function downloads(Request $request) {
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

            $url = config('app.naijacrawl_api') . '/download-details';
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

            $data['details'] = $res->details;
            $data['url'] = $res->url;

            return view('pages.download', $data);
        } catch (RequestException $res) {
            return [
                'status' => 422,
                'message' => 'Server Busy',
            ];
        }
    }

    public function downloadTag(Request $request, $slug) {
        $link = $request->server('HTTP_REFERER');
        $input = $request->all();
        $ip = $request->getClientIp();
        $input['slug'] = $slug;
        $input['link'] = $link;
        $input['ip'] = $ip;
        try {
            $client = new Client();
            $headers = [
                'API-Key' => env('API_KEY')
            ];

            $url = config('app.naijacrawl_api') . '/tag-download';
            $response = $client->request('GET', $url, [
                'headers' => $headers,
                'query' => $input
            ]);

            $res = json_decode($response->getBody());
            if ($res->status == 455) {
                abort(455);
            }
            return response()->download($res->file);
        } catch (RequestException $res) {
            return [
                'status' => 422,
                'message' => 'Server Busy',
            ];
        }
    }

    public function downloadBatch(Request $request) {
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

            $url = config('app.naijacrawl_api') . '/batch-download';
            $response = $client->request('GET', $url, [
                'headers' => $headers,
                'query' => $output
            ]);

            $res = json_decode($response->getBody());
            if ($res->status == 455) {
                abort(455);
            }
            return response()->download($res->file)->deleteFileAfterSend(true);
        } catch (RequestException $res) {
            return [
                'status' => 422,
                'message' => 'Server Busy',
            ];
        }
    }

}
