
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" id="html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Lost & Found</title>

    <!-- Fonts -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body id="bg-login">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" id="navbar"
        style="position: sticky; top: 0; z-index: 1000; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
            <div class="container">
                <a class="navbar-brand fw-bold " href="{{ url('/home') }}">
                    <i class="bi bi-house-fill"></i>
                </a>
                <button class="navbar-toggler"  type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon" style="color: #FFA559;"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <a class="navbar-brand{{ Request::is('losts') ? ' active' : '' }}"
                    style="color: {{ Request::is('losts') ? '#FFA559' : '#FFFFFF' }};
                            text-decoration: {{ Request::is('losts') ? 'underline' : 'none' }};"
                    href="{{ url('/losts') }}">
                        Lost
                    </a>
                    <a class="navbar-brand{{ Request::is('founds') ? ' active' : '' }}"
                    style="color: {{ Request::is('founds') ? '#FFA559' : '#FFFFFF' }};
                            text-decoration: {{ Request::is('founds') ? 'underline' : 'none' }};"
                    href="{{ url('/founds') }}">
                        Found
                    </a>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="btn btn-dark dropdown-toggle " style="color: #FFA559;border-radius:12px; background-color:black" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-dark dropdown-menu-end" style="aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" style="color: #FFFFFF;" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <i class="bi bi-box-arrow-left fs-5 me-2"></i> LOGOUT
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 px-5 mx-5">
            @yield('content')
            @stack('scripts')
            @include('sweetalert::alert')

        </main>
    </div>
</body>
</html>
