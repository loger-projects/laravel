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
                <div class="col-auto mx-auto" id="signin-form">
                    <div><h1 class="text-center">Sign In</h1></div>
                    <div>
                        <form action="{{ route('user.signin') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Sign In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<style>
    div#signin-form {
        max-width: 400px;
        margin-top: 50px;
        background-color: #153C54;
    }
</style>