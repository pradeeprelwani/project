<?php

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
Route::group(['middleware' => 'auth'], function() {


    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/send-request/{user_following_id}', 'UserController@sendRequest')->name('user.send_request');
    Route::get('/block-user/{user_id}', 'UserController@blockUser')->name('user.block_user');
    Route::get('/users', 'UserController@index')->name('user.index');
    Route::get('/pending-requests', 'UserController@pendingRequests')->name('user.pending_requests');
    Route::get('/accept-request/{request_id}', 'UserController@acceptRequest')->name('user.accept_request');
});
