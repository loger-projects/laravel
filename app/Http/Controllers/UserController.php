<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\User;
use Route;
use Auth;
use Validator;
use Hash;

class UserController extends Controller
{
    public function showRegisterPage () 
    {
        return view('user.register');
    }

    public function showLoginPage () 
    {
        return view('user.login');
    }

    public function register (Request $request) 
    {
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

        return redirect()->route('user.showLoginPage')
                        ->withSuccess('You have Registed');
    }

    public function login (Request $request) 
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|max:255'
        ]);

        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])) {
            return redirect()->route('user.profile');
        }
        return 'Login fail';
    }

    public function profile () 
    {
        return view('user.profile');
    }

    public static function routes () 
    {
        Route::group([
            'middleware' => 'guest'
        ], function () {
            Route::name('user')->group(function () {
                Route::get('/user/register', 'UserController@showRegisterPage')->name('.showRegisterPage');
                Route::get('/user/login', 'UserController@showLoginPage')->name('.showLoginPage');
                Route::post('/user/register', 'UserController@register')->name('.register');
                Route::post('/user/login', 'UserController@login')->name('.login');
            });
        });

        Route::group([
            'middleware' => 'auth'
        ], function () {
            Route::name('user')->group(function () {
                Route::get('/user/profile', 'UserController@profile')->name('.profile');
            });
        });
    }
}
