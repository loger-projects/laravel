<?php

namespace App\Http\Controllers;

use Validator;
use Route;
use Auth;
use Hash;
use App\User;
use Illuminate\Http\Request;

class CustomAuthController extends Controller
{
    public function showRegisterPage () {
        return view('user.customRegister');
    }

    public function showLoginPage() {
        return view('user.customLogin');
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|max:255'
        ]);
        
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);

        return redirect()->route('customAuth.showLoginPage')
                        ->withSuccess('You have Registed');
    }

    public function login (Request $request) {
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|max:255'
        ]);

        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])) {
            return view('user.profile');
        }
        return 'Login fail';
    }

    public static function routes() {
        return Route::name('customAuth')->group(function() {
            Route::get('custom-register', 'CustomAuthController@showRegisterPage')->name('.showRegisterPage');
            Route::get('custom-login', 'CustomAuthController@showLoginPage')->name('.showLoginPage');
            Route::post('custom-register', 'CustomAuthController@register')->name('.register');
            Route::post('custom-login', 'CustomAuthController@login')->name('.login');
        });
    }
}
