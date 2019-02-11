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
        @if(Session::has('success'))
        <div class="row">
            <div class="alert alert-success col-12 text-center">
                {{ Session::get('success') }}
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-auto mx-auto" id="login-form">
                <div>
                    <h1 class="title text-center">Login</h1>
                </div>
                <div>
                    <form action="{{ route('user.login') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-secondary">Log in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


<style>
    div#login-form {
        max-width: 800px;
        margin-top: 50px;
        padding: 30px 20px;
    }
    div#login-form form label{
        font-size: 1rem;
        padding: 5px 0;
    }
</style>