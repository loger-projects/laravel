<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
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

    public function destroy(Request $request)
    {
        $cart = Session::get('cart');
        Stripe::setApiKey("sk_test_BTqnguV7hFn35JsIKWHPcyA9");

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        $charge = Charge::create([
            'amount' => $cart->totalPrice*100,
            'currency' => 'usd',
            'description' => 'Example charge',
            'source' => $token,
        ]);

        // Session::forget('cart');
        return $request->all();
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
