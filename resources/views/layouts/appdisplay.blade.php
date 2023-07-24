<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" id="html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body id="bg-login">
    <div id="app">
        <div class="mt-3 ms-3">
            <a href="{{ route('founds.index') }}">
                <img src="{{ ('images/lo-fo hori.png')}}" style="width: 150px">
            </a>
        </div>
        <main class="py-4 px-5 mx-5">
            @yield('content')
            @stack('scripts')
        </main>
    </div>
</body>
</html>
