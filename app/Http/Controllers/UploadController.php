<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;
use Crypt;

class UploadController extends Controller {

    public function index(Request $request) {
//        $dd = Crypt::encrypt('Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjQ1Y2YyYWE4NDMyNGE5YmU4YmFkYTdhMjBiMDUxZmRmN2YxNmM2NjQzNDM4OWQ4MWM2YjA4Y2FiODlhNGI5MDExYTdiZjg2MjViNTZlMGM3In0.eyJhdWQiOiIxIiwianRpIjoiNDVjZjJhYTg0MzI0YTliZThiYWRhN2EyMGIwNTFmZGY3ZjE2YzY2NDM0Mzg5ZDgxYzZiMDhjYWI4OWE0YjkwMTFhN2JmODYyNWI1NmUwYzciLCJpYXQiOjE1ODgzMTkyMjksIm5iZiI6MTU4ODMxOTIyOSwiZXhwIjoxNjE5ODU1MjI5LCJzdWIiOiIzNTU0Iiwic2NvcGVzIjpbXX0.GQvb4z_REsCymcpxV0P5XOFLhdD3Afzft1P4-sebH-4vQfElJfMJ5bsWFiK-1i0r_dMeht2Ui4JyDF1PgA0ko9xT4KJHE-h1KOb4x1oXnIemcBdRUOwxIRJA9B_Ox6f6476wE3zuTsp5ISR5K7Z4fEVQ9_E55G1Q3AjWLWxdAVCsvhF1lnAqwh67P3ciL_MBAlj-76bFujXe0PGOjWX90bvBFt1S68cQvjKxLRbGGyvKy8DTXnjGK-naJl8Pp6-ejCw1J1BnKOp84ejN6akYuSWD9PadUF9KEYBXGFq8dKaf3Kq9CPzKYvr0oFGFTy7Ih0ZKxdOSNPK3aH88DItdRYzFCcC2tQzyu5wqCHcqzVqtXol5lzU5vqGRaAfv0t1Cm2wT2z1BEv0WFGnn_tnpO_LHqEGLlRvFbeDDaNLwlYXVv8Pg-AMWqxt2XpnOB1RxyA0pd1O8EZ3NRVuYg_RL9bd-c9pa6pAvpb3IA4tNmTULeF-hh4lssnzfSae09K7CUbsdT6edbR4cfAKeA4gASjEvA15Y39cX-MwJ477_oagZseFYoU-F8JMsk3ABanROc-EB8Gt2mnFuV_Xs_avWeLGHEfvo-A8cRYFxWm7tjSPTJcbAiP4SaEv2dncm_yyL1L6uUIs95gSltOjzTEDQEBp-uOLVr0i8vitPCh943c4');
//      dd($dd);
        if (Cache::has('countupload')) {
            $res = Cache::get('countupload');
        } else {
            $headers = [
                'API-Key' => env('API_KEY'),
                'Authorization' => Crypt::decrypt(env('API_SECRET')),
                'Website' => env('APP_URL')
            ];
            $client = new Client();
            $url = config('app.naijacrawl_api') . '/mp3-get_count';
            $response = $client->request('GET', $url, [
                'headers' => $headers
            ]);

            $res = json_decode($response->getBody());
            if (empty($res)) {
                abort(405);
            }
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
            if (config('app.test') == 'test') {
                $data = [
                    'status' => 411,
                    'message' => 'Sorry uploading on demo not allow please use our live mp3tager editor'
                ];
                return [
                    'data' => $data
                ];
            }
            $url = config('app.naijacrawl_api') . '/mp3-upload-tag';
            $client = new Client();
            $response = $client->request('POST', $url, [
                'headers' => [
                    'API-Key' => env('API_KEY'),
                    'Authorization' => Crypt::decrypt(env('API_SECRET')),
                    'Website' => env('APP_URL')
                ],
                'multipart' => $output
            ]);

            $data = json_decode($response->getBody());
            if (empty($data)) {
                $data = [
                    'status' => 411,
                    'message' => 'You are not Authorized to use this script'
                ];
                return [
                    'data' => $data
                ];
            }


            return [
                'data' => $data
            ];
        } catch (\GuzzleHttp\Exception\RequestException $data) {

            if ($data->hasResponse()) {
                $response = $data->getResponse();
                if ($response->getStatusCode() == 500) {
                    $data = [
                        'status' => 422,
                        'message' => 'Server Error',
                    ];
                    return [
                        'data' => $data
                    ];
                }
                if ($response->getStatusCode() == 404) {
                    $data = [
                        'status' => 422,
                        'message' => 'Page not found',
                    ];
                    return [
                        'data' => $data
                    ];
                }
            }
        }
    }

    public function storeLink(Request $request) {
        $input = $request->all();
        try {
            $headers = [
                'API-Key' => env('API_KEY'),
                'Authorization' => Crypt::decrypt(env('API_SECRET')),
                'Website' => env('APP_URL')
            ];
            $url = config('app.naijacrawl_api') . '/mp3-upload-tag-link';
            $client = new Client();
            $response = $client->request('POST', $url, [
                'headers' => $headers,
                'query' => $input
            ]);
            if (config('app.test') == 'test') {
                $data = [
                    'status' => 411,
                    'message' => 'Sorry uploading on demo not allow please use our live mp3tager editor'
                ];
                return [
                    'data' => $data
                ];
            }
            $data = json_decode($response->getBody());
            if (empty($data)) {
                $data = [
                    'status' => 411,
                    'message' => 'You are not Authorized to use this script'
                ];
                return [
                    'data' => $data
                ];
            }

            return [
                'data' => $data
            ];
        } catch (\GuzzleHttp\Exception\RequestException $data) {

            if ($data->hasResponse()) {
                $response = $data->getResponse();
                if ($response->getStatusCode() == 500) {
                    $data = [
                        'status' => 422,
                        'message' => 'Page not found',
                    ];
                    return [
                        'data' => $data
                    ];
                }
                if ($response->getStatusCode() == 404) {
                    $data = [
                        'status' => 422,
                        'message' => 'Page not found',
                    ];
                    return [
                        'data' => $data
                    ];
                }
            }
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
                'API-Key' => env('API_KEY'),
                'Authorization' => Crypt::decrypt(env('API_SECRET')),
                'Website' => env('APP_URL')
            ];

            $url = config('app.naijacrawl_api') . '/mp3-tag-details';
            $response = $client->request('GET', $url, [
                'headers' => $headers,
                'query' => $output
            ]);

            $res = json_decode($response->getBody());
            if (empty($res)) {
                $data = [
                    'status' => 411,
                    'message' => 'You are not Authorized to use this script'
                ];
                return [
                    'data' => $data
                ];
            }
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
        } catch (\GuzzleHttp\Exception\RequestException $res) {

            if ($res->hasResponse()) {
                $response = $res->getResponse();
                if ($response->getStatusCode() == 500) {
                    $data = [
                        'status' => 422,
                        'message' => 'Page not found',
                    ];
                    return [
                        'data' => $data
                    ];
                }
                if ($response->getStatusCode() == 404) {
                    $data = [
                        'status' => 422,
                        'message' => 'Page not found',
                    ];
                    return [
                        'data' => $data
                    ];
                }
            }
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
                'API-Key' => env('API_KEY'),
                'Authorization' => Crypt::decrypt(env('API_SECRET')),
                'Website' => env('APP_URL')
            ];

            $url = config('app.naijacrawl_api') . '/mp3-save-tag';
            $response = $client->request('POST', $url, [
                'headers' => $headers,
                'multipart' => $output
            ]);

            $res = json_decode($response->getBody());
            if (empty($res)) {
                $data = [
                    'status' => 411,
                    'message' => 'You are not Authorized to use this script'
                ];
                return [
                    'data' => $data
                ];
            }
            if ($res->status == 401) {
                session()->flash('message.level', 'error');
                session()->flash('message.color', 'red');
                session()->flash('message.content', 'Invalid Response');
                return redirect()->route('upload');
            }
            return [
                'data' => $res
            ];
        } catch (\GuzzleHttp\Exception\RequestException $res) {

            if ($res->hasResponse()) {
                $response = $res->getResponse();
                if ($response->getStatusCode() == 500) {
                    $data = [
                        'status' => 422,
                        'message' => 'Page not found',
                    ];
                    return [
                        'data' => $data
                    ];
                }
                if ($response->getStatusCode() == 404) {
                    $data = [
                        'status' => 422,
                        'message' => 'Page not found',
                    ];
                    return [
                        'data' => $data
                    ];
                }
            }
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
        $output[] = [
            'contents' => $value
        ];

        try {
            $client = new Client();
            $headers = [
                'API-Key' => env('API_KEY'),
                'Authorization' => Crypt::decrypt(env('API_SECRET')),
                'Website' => env('APP_URL')
            ];

            $url = config('app.naijacrawl_api') . '/mp3-download-details';
            $response = $client->request('GET', $url, [
                'headers' => $headers,
                'query' => $output
            ]);

            $res = json_decode($response->getBody());
            if (empty($res)) {
                abort(405);
            }
            if ($res->status == 401) {
                session()->flash('message.level', 'error');
                session()->flash('message.color', 'red');
                session()->flash('message.content', 'Invalid Response');
                return redirect()->route('upload');
            }
            $data['details'] = $res->details;
            $name = public_path(config('app.tag_path') . '/' . $res->path);
            $data['url'] = $res->url;
            if (!file_exists($name)) {
                copy($res->file, $name);
            }

            return view('pages.download', $data);
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

    public function downloadTag(Request $request, $slug) {
        $link = $request->server('HTTP_REFERER');
        $input = $request->all();
        $ip = $request->getClientIp();
        $input['slug'] = $slug;
        $input['link'] = $link;
        $input['ip'] = $ip;
        $input['website'] = config('app.url');

        try {
            $client = new Client();
            $headers = [
                'API-Key' => env('API_KEY'),
                'Authorization' => Crypt::decrypt(env('API_SECRET')),
                'Website' => env('APP_URL')
            ];

            $url = config('app.naijacrawl_api') . '/mp3-tag-download';
            $response = $client->request('GET', $url, [
                'headers' => $headers,
                'query' => $input
            ]);

            $res = json_decode($response->getBody());

            if (empty($res)) {
                abort(405);
            }
            if ($res->status == 455) {
                abort(455);
            }
            $file = public_path('content/' . $res->tag->path);
            return response()->download($file);
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
                'API-Key' => env('API_KEY'),
                'Authorization' => Crypt::decrypt(env('API_SECRET')),
                'Website' => env('APP_URL')
            ];

            $url = config('app.naijacrawl_api') . '/mp3-batch-download';
            $response = $client->request('GET', $url, [
                'headers' => $headers,
                'query' => $output
            ]);

            $res = json_decode($response->getBody());
            if (empty($res)) {
                abort(405);
            }
            if ($res->status == 455) {
                abort(455);
            }
            return response()->download($res->file)->deleteFileAfterSend(true);
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

}
