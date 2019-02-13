@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-6 mx-auto text-center">
            <h2>Thanks for orderd</h2>
            <div>
                <a href="{{ route('home') }}" class="btn-brow-md" role="button">Home Page</a>
            </div>
        </div>
    </div>
@endsection