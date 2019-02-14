@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-10 col-md-8 col-lg-6 mx-auto">
            <form action="{{ route('checkout.destroy') }}" method="post" id="payment-form">
                @csrf
                <div class="form-rows">
                    <label for="card-element">
                        Credit or debit card
                    </label>
                    <div id="card-element">
                    <!-- A Stripe Element will be inserted here. -->
                    </div>
                    <!-- Used to display form errors. -->
                    <div id="card-errors" role="alert"></div>
                </div>
                <button class="btn btn-brow-md">Submit Payment</button>
            </form>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/checkout_test.css') }}">
@endsection

@section('js')
    <script src="http://js.stripe.com/v3"></script>
    <script src="{{ asset('js/checkout_test.js') }}"></script>
@endsection

<style>
    div.form-rows label{
        font-weight: bold;
        padding: 5px 10px;
    }
</style>
