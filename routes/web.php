<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'ProductController@index')->name('myHome');

/**
 * routes
 * 
 * App\Http\Controllers\UserController;
 */
UserController::routes();
ProductController::routes();