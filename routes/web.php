<?php

use App\Http\Controllers\UserController;

Route::get('/', 'ProductController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * routes
 * 
 * App\Http\Controllers\UserController;
 */
UserController::routes();