@extends('layouts.master')

@section('content')
    <div class="container">
        @if($errors->any())
        <div class="row">
            <div class="alert alert-danger col-12 text-center">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-auto mx-auto" id="register-form">
                <div>
                    <h1 class="title text-center">Register</h1>
                </div>
                <div>
                    <form action="{{ route('user.register') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' in-valid' : '' }}" value="{{ old('name') }}">
                            @if($errors->has('name'))
                                <div class="alert alert-danger">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                            @if($errors->has('email'))
                                <div class="alert alert-danger">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" class="form-control">
                            @if($errors->has('password'))
                                <div class="alert alert-danger">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirmed Password</label>
                            <input type="password" name="password_confirmation" class="form-control">
                            @if($errors->has('password_confirmation'))
                                <div class="alert alert-danger">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-secondary">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    div#register-form {
        max-width: 800px;
        margin-top: 50px;
        padding: 30px 20px;
    }
    div#register-form form label{
        font-size: 1rem;
        padding: 5px 0;
    }
</style>