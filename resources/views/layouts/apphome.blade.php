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

<body id="bg-login"
style="background-image: url('{{ asset("images/home.png") }}');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
        margin: 0;">
    <div id="app">
        <div class="container">
            <div class="row mt-3">
                <div class="col-xl-10 col-md-0">
                    <p>
                        {{-- KOSONG --}}
                    </p>
                </div>

                <div class="col-xl-2 col-md-12">
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
        </div>

        <main class="py-4 px-5 mx-5">
            @yield('content')
            @stack('scripts')

        </main>
    </div>
</body>
</html>
