@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-10 col-md-8 col-lg-6 mx-auto">
            <form action="{{ route('checkout.destroy') }}" method="POST">
                @csrf
                <script
                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                    data-key="pk_test_1NjfUjwr5dpRL1CXBQmQXozm"
                    data-amount="999"
                    data-name="Loger Nam"
                    data-description="Example charge"
                    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                    data-locale="auto">
                </script>
            </form>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/checkout_test.css') }}">
@endsection

@section('js')
    <script src="{{ asset('js/checkout_test.js') }}"></script>
@endsection