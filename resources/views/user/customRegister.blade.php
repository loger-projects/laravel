@extends('master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-auto mx-auto" id="register-form">
                <form action="{{ route('customAuth.register') }}" method="post">
                    
                </form>
            </div>
        </div>
    </div>
@endsection