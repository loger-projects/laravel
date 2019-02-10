<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/master.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/reset.css') }}">
    @yield('css')
</head>
<body>
    <div id="root">
        @include('partials.header')
        @yield('content')
    </div>
    <script src="{{ asset('/js/popper.min.js') }}"></script>
    <script src="{{ asset('/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/js/master.js') }}"></script>
    @yield('js')
</body>
</html>