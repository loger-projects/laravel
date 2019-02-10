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
            'email' => 'required|unique:users',
            'password' => 'required|confirmed'
        ]);

        $data = $request->all(); // array
        User::create($data);

        // return Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]) ? redirect()->route('user.profile') : redirect()->back();
        return redirect()->route('signin');
    } 

    public function signinPage() {
        return view('user.signin');
    }

    public function signin(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        return (Auth::guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]) ) ?
            redirect()->route('user.profile') : redirect()->back();
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
