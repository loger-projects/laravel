<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Route;
use App\Models\Product;
use App\Models\Cart;

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

    public function addToCart(Request $request, $id) {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        // return redirect()->route('myHome');
        return session('cart');
    }

    public static function Routes() {
        Route::name('product')->group(function() {
            Route::get('add-to-cart/{id}', 'ProductController@addToCart')->name('.addToCart');
        });
    }
}
