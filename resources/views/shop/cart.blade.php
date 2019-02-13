@extends('layouts.master')

@section('content')
@if (Session::has('cart'))
<div class="container cart-container">
    <div class="row">
        <table class="cart-table table text-center align-middle">
            <thead>
                <tr>
                    <th>Action</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>x</td>
                    <td><div class="img"><img src="{{ $product['img'] }}" alt="No image"></div></td>
                    <td><div class="name">{{ $product['name'] }}</div></td>
                    <td><div class="price">${{ $product['price'] }}</div></td>
                    <td><div class="qty">{{ $product['qty'] }}</div></td>
                    <td><div class="total">${{ $product['qty']*$product['price'] }}</div></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-6">
            <form action="{{ route('home') }}" method="post" class="coupon-form">
                <input type="text" name="coupon">
                <button class="btn-brow-md">Enter Coupon</button>
            </form>
        </div>
        <div class="col-6 proceed-checkout">
            <div class="totalPrice">${{ $totalPrice }}</div>
            <div><a href="{{ route('checkout.index') }}" class="btn-brow-md" role="button">Proceed Checkout</a></div>
        </div>
    </div>
</div>
@else
<div class="container">
    <div class="row cart-empty">
        <div class="col-12">
            <p>Your cart is currently empty!</p>
        </div>
        <div class="col-12">
            <a href="{{ route('home') }}" class="btn-brow-md" role="button"><i class="fas fa-shopping-cart"></i>Continue Shoping</a>
        </div>
    </div>
</div>
@endif
@endsection

<style>
    div.cart-container {
        padding-top: 100px;
    }
    div.proceed-checkout {
        text-align: right;
        padding-right: 50px;
    }
    div.proceed-checkout div.totalPrice {
        color: #000;
        font-size: 2rem;
        font-weight: bold;
        padding: 40px;
    }
    table.cart-table {
        font-weight: bold;
    }
    table.cart-table thead tr {
        background-color: #C0AA83;
        color: #fff;
    }
    table.cart-table tbody tr:nth-child(even) {
        background-color: #f6f6f6;
    }
    table.cart-table tbody tr td div.img {
        width: 56px;
        height: auto;
    }
    table.cart-table tbody tr td div.img img{
        width: 100%;
    }
    table.cart-table tbody tr td div.name {
        color: #000;
    }
    table.cart-table tbody tr td div.price, table.cart-table tbody tr td div.total {
        color: #c0aa83;
    }
    div.cart-empty {
        border-top: 3px solid #C0AA83;
        margin-top: 100px;
    }
    div.cart-empty div:first-child {
        padding: 20px 0px 50px 30px;
        font-size: 2rem;
        font-weight: bold;
    }
    div.cart-empty div:last-child {
        padding: 0;
    }
</style>