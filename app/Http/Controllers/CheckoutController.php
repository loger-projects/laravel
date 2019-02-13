<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Route;
use Session;

class CheckoutController extends Controller
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function index()
    {
        if (! Session::has('cart')) {
            return redirect()->route('product.cart');
        }
        $cart = Session::get('cart');

        return view('checkout.index', ['products' => collect($cart->items), 'totalQty' => $cart->totalQty, 'totalPrice' => $cart->totalPrice]);
    }
    
    /**
     * Undocumented function
     *
     * @return void
     */
    public function test()
    {
        if (! Session::has('cart')) {
            return redirect()->route('product.cart');
        }
        $cart = Session::get('cart');

        return view('checkout.test', ['products' => collect($cart->items), 'totalQty' => $cart->totalQty, 'totalPrice' => $cart->totalPrice]);
    }

    public function destroy()
    {
        // Session::forget('cart');
        return view('checkout.destroy');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public static function routes()
    {
        Route::name('checkout')->group(function() {
            Route::get('/checkout', 'CheckoutController@index')->name('.index');
            Route::get('/checkout/test', 'CheckoutController@test')->name('.test');
            Route::post('/checkout/destroy', 'CheckoutController@destroy')->name('.destroy');
        });
    }
}
