@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-6 mx-auto text-center">
            <h2>Thanks for orderd</h2>
            <div>
                <button class="btn-brow-md" id="go-home-page-btn">Home Page</button>
            </div>
        </div>
    </div>
@endsection

<script>
    document.getElementById('go-home-page-btn').addEventListener('click', () => {
        window.location.href = "{{ route('home') }}";
    });
</script>