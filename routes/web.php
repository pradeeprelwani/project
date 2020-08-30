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

    Route::group(['prefix' => 'card','namespace'=>'Rider'], function() {
        Route::get('/', 'CardController@index')->name('card.index');
        Route::get('/create', 'CardController@create')->name('card.create');
        Route::post('/store', 'CardController@store')->name('card.store');
    });
    
     Route::get('/rides', 'Rider\RidesController@index')->name('rider.rides.index');
      Route::get('/create', 'Rider\RidesController@create')->name('rider.rides.create');
     Route::post('/create', 'Rider\RidesController@store')->name('rider.rides.store'); 
});
Route::group(['prefix' => 'driver'], function() {
    Route::get('/login', 'Auth\DriverAuthController@login')->name('driver.login');
    Route::post('/login', 'Auth\DriverAuthController@loginPost')->name('driver.login.post');
    Route::get('/register', 'Auth\DriverAuthController@register')->name('driver.register');
    Route::post('/register', 'Auth\DriverAuthController@store')->name('driver.store');

    Route::group(['middleware' => 'drivers','namespace'=>'Driver'], function() {
        Route::get('/home', 'HomeController@index')->name('driver.home');
        Route::get('/rides', 'RidesController@index')->name('rides.index');
        Route::post('/ride/status', 'RidesController@changeRideStatus')->name('rides.status');
        Route::post('/logout', 'Auth\DriverAuthController@index')->name('driver.logout');
    });
});
