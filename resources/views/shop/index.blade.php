@extends('layouts.master')
@section('content')
    <section class="view-cart">
        
    </section>
    <section class="item-list">
        <div class="container">
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-10 col-md-5 col-lg-3"> <!-- md: 768 -->
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
                                    <button class="btn btn-secondary">
                                        <a href="{{ route('product.addToCart', ['id' => $product->id]) }}" class="text-white">Add To Cart</a>
                                    </button>
                                </div>
                                <div class="view-cart">
                                    <a href="#">View Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection