@extends('layouts.master')

@section('content')
    <div class="container text-center">
        <h2>{{ Auth::user()->name }}</h2>
        <h2>User Profile</h2>
    </div>
@endsection