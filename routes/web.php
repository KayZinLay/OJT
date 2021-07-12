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
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/postlist', 'App\Http\Controllers\PostController@getAllPostList')->name('postlist');
    //Route::get('/user/store', 'App\Http\Controllers\UserController@storeNewUserData')->name('user#store');
});
