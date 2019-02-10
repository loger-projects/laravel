@extends('layouts.master')
@section('content')
    <section class="view-cart">
        
    </section>
    <section class="item-list">
        <div class="container">
            <div class="row flex-columns justify-content-center">
                <div class="col-md-6 col-7"> <!-- md: 768 -->
                    @foreach ($products as $product)
                        <div class="cart-item">
                            <div class="img-wrap">
                                <img src="{{ $product->img }}" alt="item 1" style="width: 100%;">
                            </div>
                            <div class="item-content text-center">
                                <h2 class="item-title">{{ $product->title }}</h2>
                                <div class="item-description">{{ $product->description }}</div>
                                <div class="item-price">
                                    <span>{{ $product->price }}</span>
                                </div>
                                <div class="add-to-cart-button">
                                    <button class="btn btn-secondary">Add To Cart</button>
                                </div>
                                <div class="view-cart">
                                    <a href="#">View Cart</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection