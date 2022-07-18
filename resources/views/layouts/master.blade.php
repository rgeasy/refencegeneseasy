<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>UFT</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-grid.min.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <link rel="shortcut icon" href="{{ asset('favicon.png')}}">
    @yield('css')
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
</head>

<body >
    @include('layouts/nav')

    @include('layouts/validation')

    @include('layouts/flash')

    @yield('content')

    @include('layouts/footer')

    @include('layouts/cookies')

    @yield('js')
</body>

</html>