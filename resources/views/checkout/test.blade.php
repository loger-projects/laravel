@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-10 col-md-8 col-lg-6 mx-auto checkout-form-wrap">
            <form action="{{ route('checkout.destroy') }}" method="post" id="payment-form">
                <label>
                    <input class="field is-empty" type="text" name="cardholder-name" placeholder="Loger Nam">
                    <span><span>Name</span></span>
                </label>
                <label>
                  <input class="field is-empty" type="tel" placeholder="(123) 456-7890" />
                  <span><span>Phone number</span></span>
                </label>
                <label>
                  <div class="field is-empty" id="card-element"></div>
                  <span><span>Credit or debit card</span></span>
                </label>
                <button type="submit">Pay $25</button>
                <div class="outcome">
                  <div class="error" role="alert"></div>
                  <div class="success">
                    Success! Your Stripe token is <span class="token"></span>
                  </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/checkout_test.css') }}">
@endsection

@section('js')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="http://js.stripe.com/v3"></script>
    <script src="{{ asset('js/checkout_test.js') }}"></script>
@endsection
