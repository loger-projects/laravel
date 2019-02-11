@extends('layouts.master')

@section('content')
    <div class="container text-center">
        <h2>{{ Auth::user()->name }}</h2>
        <p>Vero nihil accusamus inventore earum consequatur id explicabo quia.</p>
    </div>
@endsection