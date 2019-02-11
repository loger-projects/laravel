<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomAuthController as CustomAuth;

Route::get('/', 'ProductController@index')->name('myHome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * routes
 * 
 * App\Http\Controllers\UserController;
 */
UserController::routes();

/**
 * routes
 * 
 * App\Http\Controllers\CustomAuthController
 */
CustomAuth::routes();