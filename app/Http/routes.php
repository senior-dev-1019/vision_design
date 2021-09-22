<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function () {
        return view('welcome');
    });

Route::get('/auth/login', function () {
    return view('auth/login');
});

Route::any('logout', 'SearchController@logout')->name('logout');
Route::get('login', 'Auth\AuthController@auth')->name('login');
Route::post('reset', 'Auth\AuthController@password_request')->name('password.request');
Route::post('register', 'Auth\AuthController@show')->name('register.show');
Route::post('register/{id}', 'Auth\AuthController@create')->name('register.create');
Route::group(['middleware' => 'auth'], function() {
    Route::any('dashboard', 'SearchController@dashboard')->name('dashboard');
    Route::get('/getUsers/{id}','SearchController@getUsers')->name('/getUsers/{id}');
    Route::get('/getUser_data/{id}','SearchController@getUser_data')->name('/getUser_data/{id}');
    Route::post('update','SearchController@update')->name('update');
    Route::post('userupdate','SearchController@userupdate')->name('userupdate');
    Route::any('/delete/{id}','SearchController@delete')->name('/delete/{id}');
	Route::get('/search', array('as' => '/search','uses' => 'SearchController@getdata'));
    Route::get('users', 'App\Http\Controllers\UsersManagementController@index')->name('users');
    Route::post('users', 'App\Http\Controllers\UsersManagementController@store')->name('users.store');
    Route::get('users/create', 'App\Http\Controllers\UsersManagementController@create')->name('users.create');
    Route::get('users/{user}', 'App\Http\Controllers\UsersManagementController@show')->name('users.show');
    Route::get('users/{destroy}', 'App\Http\Controllers\UsersManagementController@destroy')->name('users.destroy');
    Route::get('users/{update}', 'App\Http\Controllers\UsersManagementController@update')->name('users.update');
    Route::get('users/{user}/edit', 'App\Http\Controllers\UsersManagementController@edit')->name('users.edit');
});

Route::any('signup', 'Auth\AuthController@signup')->name('signup');
Route::any('signin', 'Auth\AuthController@signin')->name('signin');
Route::any('signupcontrol', 'Auth\AuthController@signupcontrol')->name('signupcontrol');
Route::any('signincontrol', 'Auth\AuthController@signincontrol')->name('signincontrol');
