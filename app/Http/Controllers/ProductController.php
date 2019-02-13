<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Route;
use App\Models\Product;
use App\Models\Cart;
use Stripe\Stripe;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('shop.index', ['products' => Product::all()]);
    }

    /**
     * Undocumented function
     *
     * @param [type] $id
     * @return void
     */
    public function addToCart($id) 
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        session()->put('cart', $cart);
        // return redirect()->route('myHome');
        return redirect()->route('home');
    }
    
    /**
     * Undocumented function
     *
     * @return void
     */
    public function cart() 
    {
        if (! Session::has('cart')) {
            return view('shop.cart', ['product' => null]);
        }
        $cart = Session::get('cart');
        return view('shop.cart', ['products' => collect($cart->items), 'totalQty' => $cart->totalQty, 'totalPrice' => $cart->totalPrice]);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public static function Routes() 
    {
        Route::name('product')->group(function() {
            Route::get('add-to-cart/{id}', 'ProductController@addToCart')->name('.addToCart');
            Route::get('/cart', 'ProductController@cart')->name('.cart');
        });
    }
}
