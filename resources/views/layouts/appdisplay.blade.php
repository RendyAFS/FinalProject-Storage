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
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" id="navbar">
            <div class="container">
                <a class="navbar-brand fw-bold" href="{{ route('founds.index') }}">
                    <i class="bi bi-house-fill"></i> LOST & FOUND
                </a>
                <button class="navbar-toggler"  type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon" style="color: #FFA559;"  ></span>
                </button>
            </div>
        </nav>

        <main class="py-4 px-5 mx-5">
            @yield('content')
            @stack('scripts')

        </main>
    </div>
</body>
</html>
