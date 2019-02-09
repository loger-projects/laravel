@extends('layouts.master')

@section('name')
    <div class="container text-center">
        <h2>{{ Auth::user()->name }}</h2>
    </div>
@endsection