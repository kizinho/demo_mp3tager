<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;
use Crypt;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use App\Charts\UserCharts;

class UploadController extends Controller {

    public function index(Request $request) {


        if (Cache::has('countupload')) {
            $res = Cache::get('countupload');
        } else {
            try {
                $client_details = static::client();
                $url = config('app.naijacrawl_api') . '/mp3-get_count';
                $response = $client_details['client']->request('GET', $url, [
                    'headers' => $client_details['headers']
                ]);
                $res = json_decode($response->getBody());
                if (empty($res)) {
                    abort(405);
                }
                Cache::put('countupload', $res, 525600);
            } catch (\GuzzleHttp\Exception\RequestException $res) {

                if ($res->hasResponse()) {
                    $response = $res->getResponse();
                    if ($response->getStatusCode() == 500) {
                        abort(500);
                    }
                    if ($response->getStatusCode() == 405) {
                        abort(405);
                    }
                    if ($response->getStatusCode() == 404) {
                        abort(404);
                    }
                }
            }
        }
        $data['count_upload'] = $res->data;
        return view('pages.upload', $data);
    }

    public function imageEdit(Request $request) {

        if (Cache::has('countuploadimg')) {
            $res = Cache::get('countuploadimg');
        } else {
            try {
                $client_details = static::client();
                $url = config('app.naijacrawl_api') . '/mp3-get_count_image';
                $response = $client_details['client']->request('GET', $url, [
                    'headers' => $client_details['headers']
                ]);
                $res = json_decode($response->getBody());

                if (empty($res)) {
                    abort(405);
                }
                Cache::put('countuploadimg', $res, 525600);
            } catch (\GuzzleHttp\Exception\RequestException $res) {

                if ($res->hasResponse()) {
                    $response = $res->getResponse();
                    if ($response->getStatusCode() == 500) {
                        abort(500);
                    }
                    if ($response->getStatusCode() == 405) {
                        abort(405);
                    }
                    if ($response->getStatusCode() == 404) {
                        abort(404);
                    }
                }
            }
        }
        $data['count_upload'] = $res->data;
        return view('pages.image-edit', $data);
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
            $output[] = [
                'name' => 'random_string_upload',
                'contents' => $request->random_string_upload
            ];
            if (config('app.env') !== 'production') {
                $data = [
                    'status' => 411,
                    'message' => 'Sorry uploading on demo not allow please use our live mp3tager editor'
                ];
                return [
                    'data' => $data
                ];
            }
            $url = config('app.naijacrawl_api') . '/mp3-upload-tag';
            $client_details = static::client();
            $response = $client_details['client']->request('POST', $url, [
                'headers' => $client_details['headers'],
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
                if ($response->getStatusCode() == 405) {
                    $data = [
                        'status' => 422,
                        'message' => 'User Not Authorized to use this script',
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

            $url = config('app.naijacrawl_api') . '/mp3-upload-tag-link';
            $client_details = static::client();
            $response = $client_details['client']->request('POST', $url, [
                'headers' => $client_details['headers'],
                'query' => $input
            ]);
            if (config('app.env') !== 'production') {
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
                if ($response->getStatusCode() == 405) {
                    $data = [
                        'status' => 422,
                        'message' => 'User Not Authorized to use this script',
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

    public function storeZipLink(Request $request) {
        $input = $request->all();
        try {
            $url = config('app.naijacrawl_api') . '/mp3-upload-tag-zip-link';
            $client_details = static::client();
            $response = $client_details['client']->request('POST', $url, [
                'headers' => $client_details['headers'],
                'query' => $input
            ]);
            $data = \GuzzleHttp\json_decode($response->getBody());

            return [
                'data' => $data
            ];
        } catch (\GuzzleHttp\Exception\RequestException $data) {

            if ($data->hasResponse()) {
                $response = $data->getResponse();
                if ($response->getStatusCode() == 500) {
                    return [
                        'status' => 422,
                        'message' => 'Server Error',
                    ];
                }
                if ($response->getStatusCode() == 404) {
                    return [
                        'status' => 422,
                        'message' => 'Page not found',
                    ];
                }
            }
        }
    }

    public function storeZip(Request $request) {
        if ($request->hasFile('zip')) {
            $output = [];
            $file = $request->file('zip');
            $output[] = [
                'name' => 'file',
                'contents' => fopen($file->getPathname(), 'r'),
                'filename' => $file->getClientOriginalName()
            ];
        }

        $output[] = [
            'name' => 'random_string_upload',
            'contents' => $request->random_string_upload
        ];
        $output[] = [
            'name' => 'remove',
            'contents' => $request->remove
        ];
        try {
            $url = config('app.naijacrawl_api') . '/mp3-upload-tag-zip';
            $client_details = static::client();
            $response = $client_details['client']->request('POST', $url, [
                'headers' => $client_details['headers'],
                'multipart' => $output
            ]);
            $data = \GuzzleHttp\json_decode($response->getBody());

            return [
                'data' => $data
            ];
        } catch (\GuzzleHttp\Exception\RequestException $data) {

            if ($data->hasResponse()) {
                $response = $data->getResponse();
                if ($response->getStatusCode() == 500) {
                    return [
                        'status' => 422,
                        'message' => 'Server Error',
                    ];
                }
                if ($response->getStatusCode() == 404) {
                    return [
                        'status' => 422,
                        'message' => 'Page not found',
                    ];
                }
            }
        }
    }

    public function remove(Request $request) {
        $input = $request->all();
        try {
            $url = config('app.naijacrawl_api') . '/mp3-remove-file';
            $client_details = static::client();
            $response = $client_details['client']->request('POST', $url, [
                'headers' => $client_details['headers'],
                'query' => $input
            ]);
            $data = \GuzzleHttp\json_decode($response->getBody());

            return [
                'data' => $data
            ];
        } catch (\GuzzleHttp\Exception\RequestException $data) {

            if ($data->hasResponse()) {
                $response = $data->getResponse();
                if ($response->getStatusCode() == 500) {
                    return [
                        'status' => 422,
                        'message' => 'Server Error',
                    ];
                }
                if ($response->getStatusCode() == 404) {
                    return [
                        'status' => 422,
                        'message' => 'Page not found',
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
        if (!empty(config('app.tag_path'))) {
            $download_path = url(config('app.tag_path') . 's/');
        } elseif (!empty(config('app.main_site'))) {
            $download_path = config('app.main_site_url') . '/' . config('app.main_site') . '/';
        }
        $output[] = [
            'name' => 'url',
            'path' => $download_path
        ];
        try {
            $client_details = static::client();
            $url = config('app.naijacrawl_api') . '/mp3-tag-details';
            $response = $client_details['client']->request('GET', $url, [
                'headers' => $client_details['headers'],
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
            $data['preview'] = $res->preview;
            $data['tag_settings'] = $res->data->tag_settings;


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
                if ($response->getStatusCode() == 405) {
                    $data = [
                        'status' => 422,
                        'message' => 'User Not Authorized to use this script',
                    ];
                    return [
                        'data' => $data
                    ];
                }
            }
        }
    }

    public function tagPost(Request $request) {
        if (empty($request->queue)) {
            $job = 0;
        } else {
            $job = 1;
        }
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
        if ($request->hasFile('coverart_choice')) {
            $coverartsvoice = $request->file('coverart_choice');
            foreach ($coverartsvoice as $keyc => $covervoice) {
                if (!is_array($covervoice)) {
                    $output[] = [
                        'name' => 'coverart_choice[' . $keyc . ']',
                        'contents' => fopen($covervoice->getPathname(), 'r'),
                        'filename' => $covervoice->getClientOriginalName()
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
                        'extension' => $request->extension,
                        'tager_setting_active' => $request->tager_setting_active,
                        'tager_setting_active_text' => $request->tager_setting_active_text,
                        'tager_setting_active_image' => $request->tager_setting_active_image,
                        'zip_name' => $request->zip_name,
                        'job' => $job,
                        'output_converter' => $request->output_converter,
                        'voice_volume' => $request->voice_volume
                    ]
            ),
        ];
        $output [] = [
            'name' => 'zip_name',
            'contents' => $request->zip_name
        ];
          $output [] = [
            'name' => 'random_string_upload',
            'contents' => $request->random_string_upload
        ];
        
        $output [] = [
            'name' => 'url',
            'contents' => url('/')
        ];
        try {
            $client_details = static::client();
            $url = config('app.naijacrawl_api') . '/mp3-save-tag';
            $response = $client_details['client']->request('POST', $url, [
                'headers' => $client_details['headers'],
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
                        'status' => 500,
                        'message' => 'Server Error',
                    ];
                    return [
                        'data' => $data
                    ];
                }
                if ($response->getStatusCode() == 404) {
                    $data = [
                        'status' => 404,
                        'message' => 'Page not found',
                    ];
                    return [
                        'data' => $data
                    ];
                }
                if ($response->getStatusCode() == 405) {
                    $data = [
                        'status' => 422,
                        'message' => 'User Not Authorized to use this script',
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
            $client_details = static::client();
            $url = config('app.naijacrawl_api') . '/mp3-download-details';
            $response = $client_details['client']->request('GET', $url, [
                'headers' => $client_details['headers'],
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
            $data['url'] = $res->url;
            $data['zip'] = $res->zip;
            foreach ($res->details as $d) {
                $timeFolder = $d->time_folder;
                if (!empty(config('app.tag_path'))) {
                    $path_dir = public_path() . '/' . config('app.tag_path') . '/' . $timeFolder;
                    $path_dir2 = public_path() . '/' . config('app.tag_path') . '/';
                    $data['download_path'] = config('app.tag_path') . 's/';
                } elseif (!empty(config('app.main_site'))) {
                    $url = $_SERVER['DOCUMENT_ROOT'];
                    preg_match("/[^\/]+$/", $url, $matches);
                    $newUrl = str_replace($matches[0], '', $url);
                    $last = $newUrl . config('app.main_site_store');
                    $path_dir = $last . '/' . (config('app.main_site') . '/' . $timeFolder);
                    $path_dir2 = $last . '/' . (config('app.main_site') . '/');
                    $data['download_path'] = config('app.main_site_url') . '/' . config('app.main_site') . '/';
                } else {
                    session()->flash('message.level', 'error');
                    session()->flash('message.color', 'red');
                    session()->flash('message.content', "You didn't provide any path to save your file, please kindly do that");
                    return redirect()->route('upload');
                }

                $directory = static::enryStorageDir($path_dir);

                $name = $directory . $d->path;
                if (!file_exists($name)) {
                    $directory2 = static::enryStorageDir($path_dir2);
                    $name2 = $directory2 . $d->path;
                    if (!file_exists($name2)) {
                        try {
                            copy($res->folder . $d->path, $name);
                        } catch (\Exception $e) {
                            abort(455);
                        }
                    }
                }
            }



            if (file_exists($name)) {
                $data['p'] = false;
            } else {
                $data['p'] = true;
            }


            $data_post = Arr::pluck($res->details, 'id');
            if (!empty(config('app.main_site'))) {
                $input['ids'] = $data_post;
                $url = config('app.naijacrawl_api') . '/mp3-remove';
                $response = $client_details['client']->request('GET', $url, [
                    'headers' => $client_details['headers'],
                    'query' => $input
                ]);
            }
            $data['ex'] = $res->ex;
            $data['is_output'] = $res->is_output;
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
                if ($response->getStatusCode() == 405) {
                    abort(404);
                }
            }
        }
    }

    public function tagGetUploadM(Request $request) {
        $input = $request->all();
        try {
            $client_details = static::client();
            $url = config('app.naijacrawl_api') . '/mp3-get-tags-upload-m';
            $response = $client_details['client']->request('GET', $url, [
                'headers' => $client_details['headers'],
                'query' => $input
            ]);

            $res = json_decode($response->getBody());
            return [
                'data' => $res
            ];
        } catch (\GuzzleHttp\Exception\RequestException $res) {

            if ($res->hasResponse()) {
                $response = $res->getResponse();
                if ($response->getStatusCode() == 500) {
                    $data = [
                        'status' => 500,
                        'message' => 'Server Error',
                    ];
                    return [
                        'data' => $data
                    ];
                }
                if ($response->getStatusCode() == 404) {
                    $data = [
                        'status' => 404,
                        'message' => 'Page not found',
                    ];
                    return [
                        'data' => $data
                    ];
                }
                if ($response->getStatusCode() == 405) {
                    $data = [
                        'status' => 422,
                        'message' => 'User Not Authorized to use this script',
                    ];
                    return [
                        'data' => $data
                    ];
                }
            }
        }
    }

    public function tagGetUpload(Request $request) {
        $input = $request->all();
        try {
            $client_details = static::client();
            $url = config('app.naijacrawl_api') . '/mp3-get-tags-upload';
            $response = $client_details['client']->request('GET', $url, [
                'headers' => $client_details['headers'],
                'query' => $input
            ]);

            $res = json_decode($response->getBody());
            return [
                'data' => $res
            ];
        } catch (\GuzzleHttp\Exception\RequestException $res) {

            if ($res->hasResponse()) {
                $response = $res->getResponse();
                if ($response->getStatusCode() == 500) {
                    $data = [
                        'status' => 500,
                        'message' => 'Server Error',
                    ];
                    return [
                        'data' => $data
                    ];
                }
                if ($response->getStatusCode() == 404) {
                    $data = [
                        'status' => 404,
                        'message' => 'Page not found',
                    ];
                    return [
                        'data' => $data
                    ];
                }
                if ($response->getStatusCode() == 405) {
                    $data = [
                        'status' => 422,
                        'message' => 'User Not Authorized to use this script',
                    ];
                    return [
                        'data' => $data
                    ];
                }
            }
        }
    }

    public function tagGetUploadMutiple(Request $request) {
        $input = $request->all();
        try {
            $client_details = static::client();
            $url = config('app.naijacrawl_api') . '/mp3-get-tags-upload-mutiple';
            $response = $client_details['client']->request('GET', $url, [
                'headers' => $client_details['headers'],
                'query' => $input
            ]);

            $res = json_decode($response->getBody());
            return [
                'data' => $res
            ];
        } catch (\GuzzleHttp\Exception\RequestException $res) {

            if ($res->hasResponse()) {
                $response = $res->getResponse();
                if ($response->getStatusCode() == 500) {
                    $data = [
                        'status' => 500,
                        'message' => 'Server Error',
                    ];
                    return [
                        'data' => $data
                    ];
                }
                if ($response->getStatusCode() == 404) {
                    $data = [
                        'status' => 404,
                        'message' => 'Page not found',
                    ];
                    return [
                        'data' => $data
                    ];
                }
                if ($response->getStatusCode() == 405) {
                    $data = [
                        'status' => 422,
                        'message' => 'User Not Authorized to use this script',
                    ];
                    return [
                        'data' => $data
                    ];
                }
            }
        }
    }

    public function tagGet(Request $request) {
        $input = $request->all();
        try {
            $client_details = static::client();
            $url = config('app.naijacrawl_api') . '/mp3-get-tags';
            $response = $client_details['client']->request('GET', $url, [
                'headers' => $client_details['headers'],
                'query' => $input
            ]);

            $res = json_decode($response->getBody());

            return [
                'data' => $res
            ];
        } catch (\GuzzleHttp\Exception\RequestException $res) {

            if ($res->hasResponse()) {
                $response = $res->getResponse();
                if ($response->getStatusCode() == 500) {
                    $data = [
                        'status' => 500,
                        'message' => 'Server Error',
                    ];
                    return [
                        'data' => $data
                    ];
                }
                if ($response->getStatusCode() == 404) {
                    $data = [
                        'status' => 404,
                        'message' => 'Page not found',
                    ];
                    return [
                        'data' => $data
                    ];
                }
                if ($response->getStatusCode() == 405) {
                    $data = [
                        'status' => 422,
                        'message' => 'User Not Authorized to use this script',
                    ];
                    return [
                        'data' => $data
                    ];
                }
            }
        }
    }

    public function downloadTag(Request $request, $path, $folder, $year, $month, $slug) {
        $link = $request->server('HTTP_REFERER');
        $input = $request->all();
        $input['path_slug'] = $year . '/' . $month . '/';
        $ip = $request->getClientIp();
        $input['slug'] = $slug;
        $input['link'] = $link;
        $input['ip'] = $ip;
        $input['website'] = config('app.url');

        try {
            $client_details = static::client();
            $url = config('app.naijacrawl_api') . '/mp3-tag-download';
            $response = $client_details['client']->request('GET', $url, [
                'headers' => $client_details['headers'],
                'query' => $input
            ]);

            $res = json_decode($response->getBody());

            if (empty($res)) {
                abort(405);
            }
            if ($res->status == 455) {
                abort(455);
            }
            if (!empty(config('app.tag_path'))) {
                $download_path = public_path() . '/' . config('app.tag_path') . '/' . $res->tag->time_folder . $res->tag->path;
            } elseif (!empty(config('app.main_site'))) {
                $url = $_SERVER['DOCUMENT_ROOT'];
                preg_match("/[^\/]+$/", $url, $matches);
                $newUrl = str_replace($matches[0], '', $url);
                $last = $newUrl . config('app.main_site_store');
                $download_path = $last . '/' . config('app.main_site') . '/' . $res->tag->time_folder . $res->tag->path;
            } else {
                session()->flash('message.level', 'error');
                session()->flash('message.color', 'red');
                session()->flash('message.content', "You didn't provide any path to save your file, please kindly do that");
                return redirect()->back();
            }
            $file = $download_path;
            if (!file_exists($file)) {
                abort(455);
            }
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
                if ($response->getStatusCode() == 405) {
                    abort(405);
                }
            }
        }
    }

    public function downloadTagG(Request $request, $path, $year, $month, $slug) {
        $link = $request->server('HTTP_REFERER');
        $input = $request->all();
        $input['path_slug'] = $year . '/' . $month . '/';
        $ip = $request->getClientIp();
        $input['slug'] = $slug;
        $input['link'] = $link;
        $input['ip'] = $ip;
        $input['website'] = config('app.url');

        try {
            $client_details = static::client();
            $url = config('app.naijacrawl_api') . '/mp3-tag-download';
            $response = $client_details['client']->request('GET', $url, [
                'headers' => $client_details['headers'],
                'query' => $input
            ]);

            $res = json_decode($response->getBody());

            if (empty($res)) {
                abort(405);
            }
            if ($res->status == 455) {
                abort(455);
            }
            if (!empty(config('app.tag_path'))) {
                $download_path = public_path() . '/' . config('app.tag_path') . '/' . $res->tag->time_folder . $res->tag->path;
            } elseif (!empty(config('app.main_site'))) {
                $url = $_SERVER['DOCUMENT_ROOT'];
                preg_match("/[^\/]+$/", $url, $matches);
                $newUrl = str_replace($matches[0], '', $url);
                $last = $newUrl . config('app.main_site_store');
                $download_path = $last . '/' . config('app.main_site') . '/' . $res->tag->time_folder . $res->tag->path;
            } else {
                session()->flash('message.level', 'error');
                session()->flash('message.color', 'red');
                session()->flash('message.content', "You didn't provide any path to save your file, please kindly do that");
                return redirect()->back();
            }
            $file = $download_path;
            if (!file_exists($file)) {
                abort(455);
            }
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
                if ($response->getStatusCode() == 405) {
                    abort(405);
                }
            }
        }
    }

    public function downloadTags(Request $request, $path, $slug) {
        $link = $request->server('HTTP_REFERER');
        $input = $request->all();
        $ip = $request->getClientIp();
        $input['slug'] = $slug;
        $input['link'] = $link;
        $input['ip'] = $ip;
        $input['website'] = config('app.url');

        try {
            $client_details = static::client();
            $url = config('app.naijacrawl_api') . '/mp3-tag-download';
            $response = $client_details['client']->request('GET', $url, [
                'headers' => $client_details['headers'],
                'query' => $input
            ]);

            $res = json_decode($response->getBody());

            if (empty($res)) {
                abort(405);
            }
            if ($res->status == 455) {
                abort(455);
            }

            $file = public_path(config('app.tag_path') . '/' . $res->tag->path);
            if (!file_exists($file)) {
                abort(455);
            }
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
                if ($response->getStatusCode() == 405) {
                    abort(405);
                }
            }
        }
    }

    public function downloadBatch(Request $request) {
        $input['link'] = $request->server('HTTP_REFERER');
        $input['ip'] = $request->getClientIp();
        $input['slug'] = $request->slug;
        try {
            $client_details = static::client();
            $url = config('app.naijacrawl_api') . '/mp3-batch-download';
            $response = $client_details['client']->request('GET', $url, [
                'headers' => $client_details['headers'],
                'query' => $input
            ]);

            $res = json_decode($response->getBody());
            $files = [];
            foreach ($res->details as $value) {
                if (!empty(config('app.tag_path'))) {
                    $download_path = public_path() . '/' . config('app.tag_path') . '/' . $value->time_folder . $value->path;
                } elseif (!empty(config('app.main_site'))) {
                    $url = $_SERVER['DOCUMENT_ROOT'];
                    preg_match("/[^\/]+$/", $url, $matches);
                    $newUrl = str_replace($matches[0], '', $url);
                    $last = $newUrl . config('app.main_site_store');
                    $download_path = $last . '/' . config('app.main_site') . '/' . $value->time_folder . $value->path;
                } else {
                    session()->flash('message.level', 'error');
                    session()->flash('message.color', 'red');
                    session()->flash('message.content', "You didn't provide any path to save your file, please kindly do that");
                    return redirect()->back();
                }
                $file = $download_path;
                if (!file_exists($file)) {
                    abort(455);
                }
                $files[] = $download_path;
            }
            $zipper = new \Madnest\Madzipper\Madzipper;
            if (!empty(config('app.tag_path'))) {
                $zip_path = public_path() . '/' . config('app.tag_path') . '/' . $res->name . '.zip';
            } elseif (!empty(config('app.main_site'))) {
                $url = $_SERVER['DOCUMENT_ROOT'];
                preg_match("/[^\/]+$/", $url, $matches);
                $newUrl = str_replace($matches[0], '', $url);
                $last = $newUrl . config('app.main_site_store');
                $zip_path = $last . '/' . config('app.main_site') . '/' . $res->name . '.zip';
            }

            $zipper->make($zip_path)->add([$files]);
            $zipper->close();
            return response()->download($zip_path)->deleteFileAfterSend(true);
        } catch (\GuzzleHttp\Exception\RequestException $res) {

            if ($res->hasResponse()) {
                $response = $res->getResponse();
                if ($response->getStatusCode() == 500) {
                    abort(500);
                }
                if ($response->getStatusCode() == 404) {
                    abort(404);
                }
                if ($response->getStatusCode() == 405) {
                    abort(405);
                }
            }
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
        $myfies = 'my_file' . $request->page . $request->url_path . $request->tab . $request->q . $request->type;
        try {
            if (Cache::has($myfies)) {
                $res = Cache::get($myfies);
            } else {
                $client_details = static::client();
                $url = config('app.naijacrawl_api') . '/get_files';
                $response = $client_details['client']->request('GET', $url, [
                    'headers' => $client_details['headers'],
                    'query' => $input
                ]);

                $res = json_decode($response->getBody());
                Cache::put($myfies, $res, 60);
            }

            $data['task'] = $res->data->task;
            $data['tab'] = $res->data->tab;
            $data['search'] = $res->data->search;
            $data['type'] = $res->data->type;
            $data['is_output'] = $res->data->is_output;
            return view('pages.my-files', $data);
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

    public function myDelete(Request $request) {
        $input = $request->all();
        try {
            $client_details = static::client();
            $url = config('app.naijacrawl_api') . '/get_files';
            $response = $client_details['client']->request('DELETE', $url, [
                'headers' => $client_details['headers'],
                'query' => $input
            ]);

            $res = json_decode($response->getBody());
            if ($request->action == 'delete-permanently') {
                foreach ($res->data as $path) {

                    if (!empty(config('app.tag_path'))) {
                        $download_path = public_path() . '/' . config('app.tag_path') . '/' . $path;
                    } elseif (!empty(config('app.main_site'))) {
                        $url = $_SERVER['DOCUMENT_ROOT'];
                        preg_match("/[^\/]+$/", $url, $matches);
                        $newUrl = str_replace($matches[0], '', $url);
                        $last = $newUrl . config('app.main_site_store');
                        $download_path = $last . '/' . config('app.tag_path') . '/' . $path;
                    } else {
                        session()->flash('message.level', 'error');
                        session()->flash('message.color', 'red');
                        session()->flash('message.content', "You didn't provide any path to save your file, please kindly do that");
                        return redirect()->back();
                    }
                    $file = $download_path;
                    if (file_exists($file)) {
                        unlink($file);
                    }
                }
            }
            return [
                'data' => $res
            ];
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

    public function preview(Request $request) {
        $link = $request->server('HTTP_REFERER');
        $input = $request->all();
        $ip = $request->getClientIp();
        $input['slug'] = $request->view;
        $input['link'] = $link;
        $input['ip'] = $ip;
        $input['website'] = config('app.url');

        try {
            $client_details = static::client();
            $url = config('app.naijacrawl_api') . '/mp3-tag-download-view';
            $response = $client_details['client']->request('GET', $url, [
                'headers' => $client_details['headers'],
                'query' => $input
            ]);

            $res = json_decode($response->getBody());
            return response()->download($res->file);
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

//embed
    public function embed(Request $request) {
        $input['slug'] = $request->slug;
        try {
            $client_details = static::client();
            $url = config('app.naijacrawl_api') . '/mp3-tag-embed';
            $response = $client_details['client']->request('GET', $url, [
                'headers' => $client_details['headers'],
                'query' => $input
            ]);

            $res = json_decode($response->getBody());
            if ($res->status == 455) {
                abort(455);
            }
            $data['tags'] = $res->tags;
            if (!empty(config('app.tag_path'))) {
                $data['download_path'] = config('app.tag_path') . 's/';
            } elseif (!empty(config('app.main_site'))) {
                $data['download_path'] = config('app.main_site_url') . '/' . config('app.main_site') . '/';
            }

            return view('pages.embed', $data);
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

//embed 2
    public function embed2(Request $request) {
        $input['slug'] = $request->slug;
        try {
            $client_details = static::client();
            $url = config('app.naijacrawl_api') . '/mp3-tag-embed-v2';
            $response = $client_details['client']->request('GET', $url, [
                'headers' => $client_details['headers'],
                'query' => $input
            ]);

            $res = json_decode($response->getBody());
            if ($res->status == 455) {
                abort(455);
            }
            $data['tags'] = $res->tags;
            if (!empty(config('app.tag_path'))) {
                $data['download_path'] = config('app.tag_path') . 's/';
            } elseif (!empty(config('app.main_site'))) {
                $data['download_path'] = config('app.main_site_url') . '/' . config('app.main_site') . '/';
            }

            return view('pages.embed-v2', $data);
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

    public function played(Request $request) {
        $link = $request->server('HTTP_REFERER');
        $input = $request->all();
        $ip = $request->getClientIp();
        $input['id'] = $request->id;
        $input['link'] = $link;
        $input['ip'] = $ip;
        $input['website'] = config('app.url');

        try {
            $client_details = static::client();
            $url = config('app.naijacrawl_api') . '/mp3-tag-played';
            $response = $client_details['client']->request('POST', $url, [
                'headers' => $client_details['headers'],
                'query' => $input
            ]);
//
            $res = json_decode($response->getBody());
        } catch (\GuzzleHttp\Exception\RequestException $res) {

            if ($res->hasResponse()) {
                $response = $res->getResponse();
                if ($response->getStatusCode() == 500) {
                    abort(500);
                }
                if ($response->getStatusCode() == 404) {
                    abort(404);
                }
                if ($response->getStatusCode() == 405) {
                    abort(405);
                }
            }
        }
    }

    public function embedList(Request $request) {
        $input['slug'] = $request->slug;
        try {
            $client_details = static::client();
            $url = config('app.naijacrawl_api') . '/mp3-tag-embed-list';
            $response = $client_details['client']->request('GET', $url, [
                'headers' => $client_details['headers'],
                'query' => $input
            ]);

            $res = json_decode($response->getBody());
            if ($res->status == 455) {
                abort(455);
            }
            $data['tags'] = $res->tags;
            $data['title'] = $res->title;
            $data['ex'] = $res->ex;
            if (!empty(config('app.tag_path'))) {
                $data['download_path'] = config('app.tag_path') . 's/';
            } elseif (!empty(config('app.main_site'))) {
                $data['download_path'] = config('app.main_site_url') . '/' . config('app.main_site') . '/';
            }

            return view('pages.embed-playlist', $data);
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

    public static function client() {
        $headers = [
            'API-Key' => env('API_KEY'),
            'Authorization' => Crypt::decrypt(env('API_SECRET')),
            'Website' => url('/')
        ];
        $client = new Client();
        return [
            'headers' => $headers,
            'client' => $client
        ];
    }

    public function update() {
        $url = 'https://mp3tager.com/download-install/update-install';
        $path_dir = '../';
        $default_save_directory = static::enryStorageDir($path_dir);

        $path_u = parse_url($url, PHP_URL_PATH);
        $extension = 'zip';
        $filename = pathinfo($path_u, PATHINFO_FILENAME);
        $rand = strtoupper(Str::random(4));
        $slu = str_slug($filename, '-');
        $slug = $slu . $rand;
        $default_mp3_directory = $default_save_directory;
        $name = $default_mp3_directory . $slug . '.' . $extension;
        //  $name_u = $default_mp3_directory . $slug;
        $ch = curl_init($url);
        $fp = fopen($name, 'wb');
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_exec($ch);
        curl_close($ch);
        fclose($fp);
        $path = $default_mp3_directory;
        $location = $name;
        $zip = new \ZipArchive();
        if ($zip->open($location)) {
            $zip->extractTo($path);
            $zip->close();
        }

        if (file_exists($location)) {
            unlink($location);
        }
        session()->flash('message.level', 'success');
        session()->flash('message.color', 'green');
        session()->flash('message.content', 'Update was succesfull');
        return redirect()->back();
        // File::deleteDirectory($name_u);   
    }

    public static function enryStorageDir($default_directory, $abs = true) {
        $dir = $default_directory;
        $absPath = $dir;
        if (!is_dir($absPath)) {
            mkdir($absPath, 0777, true);
        }
        return ($abs ? $absPath : $dir);
    }

    public function analytics(Request $request, $slug) {
        $input = $request->all();
        $input['url_path'] = url('analytics/' . $slug);
        $input['slug'] = $slug;
        $analytics = $slug . $request->page;
        try {
            if (Cache::has($analytics)) {
                $res = Cache::get($analytics);
            } else {
                $client_details = static::client();
                $url = config('app.naijacrawl_api') . '/analytics';
                $response = $client_details['client']->request('GET', $url, [
                    'headers' => $client_details['headers'],
                    'query' => $input
                ]);
                $res = json_decode($response->getBody());
                Cache::put($analytics, $res, 60);
            }
            $download_country_data = $res->data->download_country_data;
            $download_title = 'Downloads';
            $download_chart = new UserCharts($download_title);
            $download_chart->labels($download_country_data->name);
            $download_chart->dataset('Downloads', 'bar', $download_country_data->value);
            $data['downloads'] = $download_chart;
            //ref
            $download_title_ref = 'Referrers';
            $download_chart_ref = new UserCharts($download_title_ref);
            $download_chart_ref->labels($download_country_data->ref_name);
            $download_chart_ref->dataset('Downloads', 'pie', $download_country_data->ref_value);
            $data['downloads_ref'] = $download_chart_ref;
            $data['title'] = $res->data->title;
            $data['downloads_table'] = $res->data->downloads_table;
            return view('pages.analytics', $data);
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

    public function clearCache() {
        $userData = session('userData');
        Cache::forget($userData);
        session()->forget('token');
        session()->forget('userData');
        session()->flash('message.level', 'success');
        session()->flash('message.color', 'green');
        session()->flash('message.content', 'Cache cleared');
        return redirect('/signin');
    }

}
