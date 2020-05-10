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

Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::resource('details', 'UserDetailsController')->middleware('auth');

Route::apiResource('details', 'UserDetailsController')->middleware('auth');



Route::get('file-upload', 'UserDetailsController@fileUpload')->name('file.upload');
Route::post('file-upload', 'UserDetailsController@fileUploadPost')->name('file.upload.post');
