<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers'], function (){

    Route::get('/login', 'Auth\LoginController@getLogin')->name('login');

    Route::post('/login', 'Auth\LoginController@login');

    Route::post('/register', 'Auth\RegisterController@register');

});

Route::group(['namespace' => 'App\Http\Controllers', 'middleware' => 'auth:api'], function () {

    Route::post('user/update-name', 'UserController@updateName');

    Route::get('user', 'UserController@show');

    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('users', 'UsersController@index');
    });



});


