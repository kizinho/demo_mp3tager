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

Route::get('/', function () {
    $token = Session::get('token');
    if (empty($token)) {
        return view('welcome');
    } else {
        return redirect('dashboard');
    }
});
Route::get('offline', function () {
    return view('pages.offline');
});
//upload
Route::get('upload', 'UploadController@index')->name('upload');
Route::post('upload', 'UploadController@store');
Route::post('upload-link', 'UploadController@storeLink');
Route::get('tags', 'UploadController@tag')->name('tags');
Route::post('tags', 'UploadController@tagPost');
Route::get('signup', 'AuthController@signUp')->name('signup');
Route::post('signup', 'AuthController@signUpCreate');
Route::get('signin', 'AuthController@signIn')->name('signin');
Route::post('signin', 'AuthController@signInPost');
Route::get('downloads', 'UploadController@downloads')->name('downloads');
Route::get('tag-downloads/{slug}', 'UploadController@downloadTag')->name('tag-downloads');
Route::get('batch-downloads', 'UploadController@downloadBatch')->name('batch-downloads');
Route::get('donate', 'DonateController@donate')->name('donate');
Route::post('donate', 'DonateController@donatePost');
Route::get('privacy-policy', 'PageController@PP')->name('privacy-policy');
Route::get('tos', 'PageController@tos')->name('tos');
Route::get('about-us', 'PageController@aboutUs')->name('about-us');
Route::get('contact-us', 'PageController@contactUs')->name('contact-us');
Route::get('how-it-works', 'PageController@how')->name('how-it-works');
//dashboard user
Route::group(['middleware' => 'token'], function() {
    Route::get('dashboard', 'UserHomeController@index')->name('dashboard');
    Route::get('add-storage', 'UserHomeController@addStorage')->name('add-storage');
    Route::post('add-storage', 'UserHomeController@PostStorage');
    Route::post('add-drive', 'UserHomeController@PostDrive');
    //my files
    Route::get('my-files', 'UserHomeController@myFile')->name('my-files');
    Route::post('my-files', 'UserHomeController@myFile');
    
    Route::delete('my-files', 'UserHomeController@myDelete');
});

