<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Route;
use Auth;

class UserController extends Controller
{
    public function signupPage () {
        return view('user.signup');
    }

    public function signup (Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique',
            'password' => 'required|confirmed'
        ]);

        $data = $request->all(); // array
        User::create($data);

        return signin($request);
    }

    public function signinPage() {
        return view('user.signin');
    }

    public function signin(Request $request) {
        Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]);
        return redirect()->route('user.profile');
    }

    public function profile() {
        return view('user.profile');
    }

    public static function routes() {
        return Route::name('user')->group((function() {
            Route::get('/signup', 'UserController@signupPage')->name('.signupPage');
            Route::post('/signup', 'UserController@signup')->name('.signup');
            Route::get('/signin', 'UserController@signinPage')->name('.signinPage');
            Route::post('/signin', 'UserController@signin')->name('.signin');
            Route::get('/user/profile', 'UserController@profile')->name('.profile');
        }));
    }
}
