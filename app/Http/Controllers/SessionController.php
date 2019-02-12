<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Route;

class SessionController extends Controller
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function test ()
    {
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
        
        return session('user');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function all()
    {
        return Session::all();
    }
    
    /**
     * Undocumented function
     *
     * @param [type] $key
     * @return void
     */
    public function destroy($key)
    {
        Session::forget($key);
        return redirect()->route('home');
    }

    public function destroyAll()
    {
        Session::flush();
        return redirect()->route('home');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public static function Routes ()
    {
        Route::group([
            'prefix' => 'session'
        ], function() {
            Route::name('session')->group(function() {
                Route::get('/test', 'SessionController@test')->name('.test');
                Route::get('/destroy/{key}', 'SessionController@destroy')->name('.destroy');
                Route::get('/all', 'SessionController@all')->name('.get.all');
                Route::get('/destroyAll', 'SessionController@destroyAll')->name('.destroy.all');
            });
        });
    }
}
