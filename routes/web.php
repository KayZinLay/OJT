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

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/postlist', 'App\Http\Controllers\PostController@getAllPostList')->name('postlist');
// Users
// User List Screen
Route::get('/userlist', 'App\Http\Controllers\UserController@getAllUserList')->name('userlist');

// User Register Screen
Route::get('/user/register', 'App\Http\Controllers\UserController@getUserRegisterInit')->name('user#register');

// User Confirm
Route::post('/user/confirm', 'App\Http\Controllers\UserController@confrimUser')->name('user#userconfirm');

// User Store
Route::post('/user/store', 'App\Http\Controllers\UserController@storeNewUserData')->name('user#store');

// User delete
Route::get('delete/{id}', 'App\Http\Controllers\UserController@deleteUser')->name('user#delete');

// User Profile
Route::get('/user/profile', 'App\Http\Controllers\UserController@getUserDataById')->name('user#profile');

// User edit
Route::get('/user/edit/{id}', 'App\Http\Controllers\UserController@getEditUserById')->name('user#edit');

// Password Init Change Screen
Route::get('/user/change', 'App\Http\Controllers\UserController@changeInitPassword')->name('user#pwdchange');

// Password Change
Route::get('/user/pwdchange', 'App\Http\Controllers\UserController@changePassword')->name('user#change');


// Post update
Route::put('/user/update/{id}', 'App\Http\Controllers\UserController@updateUser')->name('user#update');

// Posts
// Post Register
Route::get('/post/register', 'App\Http\Controllers\PostController@getPostRegisterInit')->name('post#postregister');

// Post Cnfirm
Route::post('/post/confirm', 'App\Http\Controllers\PostController@confrimPost')->name('post#postconfrim');

// Post store
Route::post('/post/store/{title}/{description}', 'App\Http\Controllers\PostController@storePostNewData')->name('post#poststore');

// Post edit
Route::get('/post/edit/{id}', 'App\Http\Controllers\PostController@getEditPostInit')->name('post#edit');

// Post update
Route::post('/post/confirm/{id}', 'App\Http\Controllers\PostController@updateConfirmPost')->name('post#updateconfirm');

// Post update
Route::post('/post/update/{id}/{title}/{description}', 'App\Http\Controllers\PostController@updatePost')->name('post#update');

// Post Delete
Route::get('/post/delete/{id}', 'App\Http\Controllers\PostController@deletePost')->name('post#delete');

// file Upload
Route::get('/upload-file', 'App\Http\Controllers\PostController@createForm')->name('upload-file');

Route::post('/fileUploadPost', 'App\Http\Controllers\PostController@fileImport')->name('fileUploadPost');

// Post Download
Route::get('/export_excel/excel', 'App\Http\Controllers\PostController@export')->name('export_excel.excel');







