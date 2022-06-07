<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BoolBnb') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/front.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- Icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    <link href="{{ asset('css/front.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- TomTom --}}
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.18.0/maps/maps.css'>
    <script src='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.18.0/maps/maps-web.min.js'></script>
    {{-- <script> (function(){ window.SS = window.SS || {}; SS.Require = function (callback){ if (typeof callback === 'function') { if (window.SS && SS.EventTrack) { callback(); } else { var siteSpect = document.getElementById('siteSpectLibraries'); var head = document.getElementsByTagName('head')[0]; if (siteSpect === null && typeof head !== 'undefined') { siteSpect = document.createElement('script'); siteSpect.type = 'text/javascript'; siteSpect.src = '/__ssobj/core.js+ssdomvar.js+generic-adapter.js';siteSpect.async = true; siteSpect.id = 'siteSpectLibraries'; head.appendChild(siteSpect); } if (window.addEventListener){ siteSpect.addEventListener('load', callback, false); } else { siteSpect.attachEvent('onload', callback, false); } } } };})(); </script> --}}
    <script src='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.18.0/services/services-web.min.js'></script>
    <script src='https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.12//SearchBox-web.js'></script>
    <script src='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.18.0/services/services-web.min.js'></script>
    <script src='https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.12//SearchBox-web.js'></script>

</head>

<body class="bg-white">

    <div id="root"></div>

    <script src="{{ asset('js/front.js') }}"></script>    
</body>

</html>
