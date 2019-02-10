<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomAuthController extends Controller
{
    public function showRegisterPage () {
        return view('user.customRegister');
    }

    public function showLoginPage() {
        return view('user.customLogin');
    }

    public function register() {

    }

    public function login () {

    }

    public static function routes() {
        return Route::name('customAuth')->group(function() {
            Route::get('custom-register', 'CustomAuthController@showRegisterPage')->name('.showRegisterForm');
            Route::get('custom-login', 'CustomAuthController@showLoginPage')->name('.showLoginForm');
            Route::post('custom-register', 'CustomAuthController@register')->name('.register');
            Route::post('custom-login', 'CustomAuthController@login')->name('.login');
        });
    }
}
