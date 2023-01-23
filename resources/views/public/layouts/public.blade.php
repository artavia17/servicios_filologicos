<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/global.css') }}" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm movile">
            <div class="container-fluid p-0">
                <a class="navbar-brand ps-3" href="{{ url('/') }}">
                    <img src="{{asset('img/SVG/logo.svg')}}">
                </a>
                <button class="navbar-toggler ps-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <input type="checkbox" id="menu_hamburguesa">
                    <label class="navbar-toggler-icon" for="menu_hamburguesa">
                        <hr/>
                        <hr/>
                        <hr/>
                    </label>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto bg_black_color">
                        <li class="nav-item">
                            <a class="nav-link text-white text-center py-3" href="">INICIO</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white text-center py-3" href="">SERVICIOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white text-center py-3" href="">ACERCA DE</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white text-center py-3" href="">CONOZCA +</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white text-center py-3" href="">CONTACTO</a>
                        </li>
                        <!-- Authentication Links -->
                        <!-- @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest -->
                    </ul>
                </div>
            </div>
        </nav>

        <nav class="estritorio d-flex justify-content-around position-fixed w-100 bottom-0 p-4">
            <div class="logo">
                <a href="">
                    <img src="{{asset('img/SVG/logo_escritorio.svg')}}">
                </a>
            </div>
            <div class="items">
                <a href="">
                    <img src="{{asset('img/SVG/logo_escritorio.svg')}}">
                </a>
            </div>
        </nav>

        <div class="">
            @yield('content')
        </div>
    </div>

    <script src="{{asset('js/type.js')}}"></script>
</body>
</html>
