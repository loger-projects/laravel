@extends('layouts.master')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-auto mx-auto" id="signup-form">
                    <div><h1 class="title text-center">Sign Up</h1></div>
                    <div>
                        <form action="{{ route('user.signup') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password:</label>
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Sign Up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<style>
    div#signup-form {
        max-width: 600px;
        margin-top: 50px;
        background-color: #153C54;
        padding: 30px 20px;
    }
    div#signup-form h1.title {
        color: #fff;
    }
    div#signup-form form label{
        color: #fff;
        font-size: 1rem;
        padding: 5px 0;
    }
</style>