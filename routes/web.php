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

//upload
Route::get('/', 'UploadController@index')->name('/');
Route::get('upload', 'UploadController@index')->name('upload');
Route::post('upload', 'UploadController@store');
Route::post('upload-link', 'UploadController@storeLink');
Route::get('tags', 'UploadController@tag')->name('tags');
Route::post('tags', 'UploadController@tagPost');
Route::get('downloads', 'UploadController@downloads')->name('downloads');
Route::get('contents/{slug}', 'UploadController@downloadTag')->name('content');
Route::get('batch-downloads', 'UploadController@downloadBatch')->name('batch-downloads');

Route::get('get-tags', 'UploadController@tagGet')->name('get-tags');