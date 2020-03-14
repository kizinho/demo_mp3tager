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
    return view('welcome');
});
//upload
Route::get('upload', 'UploadController@index')->name('upload');
Route::post('upload', 'UploadController@store');
Route::get('tags', 'UploadController@tag')->name('tags');
Route::get('signup', 'AuthController@signUp')->name('signup');
Route::get('signin', 'AuthController@signIn')->name('signin');