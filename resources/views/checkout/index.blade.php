@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row checkout-form-wrap">
            <div class="col-9 col-md-8 col-lg-6 mx-auto">
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
                  
                    <button>Submit Payment</button>
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

<style>
    div.checkout-form-wrap {
        margin-top: 100px;
    }
    form#checkout-form div.form-group label{
        font-weight: bold;
        font-size: 1.25rem;
        margin-bottom: 14px;
    }
</style>