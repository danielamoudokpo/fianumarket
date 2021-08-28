<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Emvor') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Vendor styles -->
    <link rel="stylesheet" href="{{asset('resources/vendors/zwicon/zwicon.min.css') }}">
    <link rel="stylesheet" href="{{asset('resources/vendors/animate.css/animate.min.css') }}">
    <link rel="stylesheet" href="{{asset('ads_x/css/bootstrap.min.css') }}"/>
	<link rel="stylesheet" href="{{asset('ads_x/css/bootstrap.css') }}"/>
    <!-- App styles -->
    <link rel="stylesheet" href="{{asset('resources/css/app.min.css') }}">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
</head>
<body data-sa-theme="1">
    

        <main class="py-4">
                @yield('content')
        </main>
    {{-- </div> --}}

    <!-- Javascript -->
        <!-- Vendors -->
        <script src="{{asset('resources/vendors/jquery/jquery.min.js') }}"></script>
        <script src="{{asset('resources/vendors/popper.js/popper.min.js ') }}"></script>
        <script src="{{asset('resources/vendors/bootstrap/js/bootstrap.min.js') }}"></script>

        <!-- App functions and actions -->
        <script src="{{asset('resources/js/app.min.js') }}"></script>

        
</body>
</html>
