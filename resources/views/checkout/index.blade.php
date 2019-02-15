@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-9 col-md-8 col-lg-6 mx-auto checkout-form-wrap">
                <form action="{{ route('checkout.destroy') }}" method="post" id="payment-form">
                    @csrf
                    <div class="form-row">
                        <label for="name">
                            <input type="text" class="field is-empty" name="name">
                            <span><span>Name</span></span>
                        </label>
                    </div>
                    <div class="form-row">
                        <label for="address_line1">
                            <input type="text" class="field is-empty" name="address_line1" placeholder="07 Apolo Doctor Street">
                            <span><span>Billing Address</span></span>
                        </label>
                    </div>
                    <div class="form-row">
                        <label for="address_line2">
                            <input type="text" class="field is-empty" name="address_line2" placeholder="US">
                            <span><span>Country Code</span></span>
                        </label>
                    </div>
                    <div class="form-row">
                        <label for="address_city">
                            <input type="text" class="field is-empty" name="address_city" placeholder="New York">
                            <span><span>City</span></span>
                        </label>
                    </div>
                    <div class="form-row">
                        <label for="address_country">
                            <input type="text" class="field is-empty" name="address_country" placeholder="Viet Nam">
                            <span><span>Country</span></span>
                        </label>
                    </div>
                    <div class="form-row">
                        <label>
                            <div class="field is-empty" id="card-elements"></div>
                            <span><span>Credit or Debit card</span></span>
                        </label>
                    </div>
                    <div>
                        <button type="submit">Pay $999</button>
                    </div>
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
    <link rel="stylesheet" href="{{ asset('/css/checkout.css') }}">
@endsection

@section('js')
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{ asset('/js/checkout.js') }}"></script>
@endsection