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

    public function session ()
    {
        session(['key' => 'i\'ll want Someone just likes this', 'coldplay' => 'I\'m looking for somebody']);
        session()->put('yourName', 'Kimi no nawa');
        $not_exists = session('note_exists', 'it\'s where my demon hides ');
        $get = Session::all();
        $user = [
            'no1' => 'image dragon',
            'no2' => 'demon hides',
            'no3' => 'dark in side'
        ];
        $symphony = [
            'sy1' => 'No this is all for your',
            'sy2' => 'nomate what we bearth',
            'sy3' => 'this is where my demon hides'
        ];
        $sym2 = [
            'sy1' => 'i can standing here my whole life',
            'sy2' => 'say me can i',
            'sy3' => 'could i keep running running running from my heart'
        ];
        session()->put('user', $user);
        session()->push('user.no4', $symphony);
        session()->push('user.no4', $sym2);
        $value = session()->pull('key'); // cái này sẽ delete value của session('key); nhưng session('key') vẫn tồn tại
        // return Session::all();
        session()->flash('status', 'save me if everything okay');
        return redirect()->route('user.nextSession');
    }

    public function nextSession (Request $request)
    {
        // session('status') is still alived
        return redirect()->route('user.secondSession');
    }
    public function secondSession ()
    {
        // session('status') was destroyed
        return session('status');
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
                Route::get('/user/session', 'UserController@session')->name('.session');
                Route::get('/user/nextSession', 'UserController@nextSession')->name('.nextSession');
                Route::get('/user/secondSession', 'UserController@secondSession')->name('.secondSession');
            });
        });
    }
}
