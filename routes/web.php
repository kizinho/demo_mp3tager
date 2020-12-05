<?php

use Illuminate\Support\Facades\Route;

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */
Route::get('signin', 'AuthController@signIn')->name('signin');
Route::post('signin', 'AuthController@signInPost');

//my files
Route::group(['middleware' => 'token'], function() {
    
 Route::get('cache-clear', 'UploadController@clearCache')->name('cache-clear');
//upload
Route::get('/', 'UploadController@index')->name('/');
Route::get('upload', 'UploadController@index')->name('upload');
Route::get('image-editing', 'UploadController@imageEdit')->name('image-editing');
//analytics
Route::get('analytics/{slug}', 'UploadController@analytics')->name('analytics');
Route::post('upload', 'UploadController@store');
Route::post('upload-link', 'UploadController@storeLink');
Route::get('tags', 'UploadController@tag')->name('tags');
Route::post('tags', 'UploadController@tagPost');
Route::get('downloads', 'UploadController@downloads')->name('downloads');
Route::get('my-files', 'UploadController@myFile')->name('my-files');
Route::post('my-files', 'UploadController@myFile');
Route::delete('my-files', 'UploadController@myDelete');
Route::get('get-tags', 'UploadController@tagGet')->name('get-tags');
Route::get('get-upload', 'UploadController@tagGetUpload')->name('get-upload');
Route::get('get-upload-m', 'UploadController@tagGetUploadM')->name('get-upload-m');
Route::get('get-upload-muitple', 'UploadController@tagGetUploadMutiple')->name('get-upload-muitple');
Route::get('update-tager', 'UploadController@update')->name('update-tager');
//zip
Route::post('upload-zip-link', 'UploadController@storeZipLink');
Route::post('upload-zip', 'UploadController@storeZip');
Route::post('remove-file', 'UploadController@remove');

Route::get('preview', 'UploadController@preview')->name('preview');
});
Route::get('{path}/{slug}', 'UploadController@downloadTags')->name('content');
//wih date
Route::get('{path}/{year}/{month}/{slug}', 'UploadController@downloadTagG');
Route::get('{path}/{folder}/{year}/{month}/{slug}', 'UploadController@downloadTag');
Route::get('zip-downloads', 'UploadController@downloadBatch')->name('zip-downloads');
Route::get('embed-link', 'UploadController@embed')->name('embed-link');
Route::get('playlist-embed', 'UploadController@embedList')->name('playlist-embed');