<?php

use App\Http\Controllers\UserController as User;
use App\Http\Controllers\ProductController as Product;
use App\Http\Controllers\SessionController as Session;
use App\Http\Controllers\CheckoutController as Checkout;



Route::get('/', 'ProductController@index')->name('home');

Auth::routes();
User::routes();
Product::routes();
Session::routes();
Checkout::routes();