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

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/user', [
    'as' => 'user', 'uses' => 'UserController@index'
    ]);

Route::get('/user/{id}/deactivate', [
    'as' => 'user.deactivate', 'uses' => 'UserController@deactivate'
    ]);

Route::get('/user/{id}/activate', [
    'as' => 'user.activate', 'uses' => 'UserController@activate'
    ]);