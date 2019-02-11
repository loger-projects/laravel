<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SessionController;

Auth::routes();

Route::get('/', 'ProductController@index')->name('home');

UserController::routes();
ProductController::routes();
SessionController::routes();