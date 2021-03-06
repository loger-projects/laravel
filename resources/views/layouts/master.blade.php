<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/master.css') }}">
    @yield('css')
</head>
<body>
    <div id="root">
        @include('partials.header')
        @yield('content')
    </div>
    <script src="{{ asset('/js/master.js') }}"></script>
    @yield('js')
</body>
</html>