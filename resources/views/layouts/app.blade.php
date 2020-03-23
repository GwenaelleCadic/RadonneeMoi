<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylsheet" href={{asset('css/style.css')}}>
    <title>RandonneeMoi</title>
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!--<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.2.1/css/ol.css" type="text/css">
    <!-- Styles -->
    {{-- <link href="{{ asset('css/style.css') }}" rel="stylesheet"> --}}

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.2.1/build/ol.js"></script>
--><script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>    

    <style>
        .map {
            height: 400px;
            width: 50%;
            margin-left:auto;
            margin-right:auto;
            }
    </style>
</head>
<body>
    <!--<div id="app">-->
        @include('inc.navbar')
        <!--<main class="py-4">-->
            @yield('content')
        <!--</main>-->
    <!--</div>-->
</body>
</html>
