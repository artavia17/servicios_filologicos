<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Servicios de Filología @yield('title')</title>

    <link rel="icon" href="{{asset('public\img\SVG\logo_escritorio.svg')}}" sizes="32x32">


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="servicios filologicos, filologia, tesis, español, correcciones, ortografia, correccion, clases">
    <meta name="author" content="Alonso Artavia, artaviaalonso60@gmail.com">
    <meta name='url' content='https://www.serviciosfilologicos.com'>
    <meta name='identifier-URL' content='https://www.serviciosfilologicos.com'>
    <meta name='subject' content='serviciosfilologicos.com subject'>
    <meta name='copyright' content='serviciosfilologicos.com'>
    <meta name='og:title' content='Servicios Filológicos'>
    <meta name='og:type' content='Servicios Filológicos'>
    <meta name='og:url' content='https://www.serviciosfilologicos.com'>
    <meta name='og:image' content='{{asset('public\img\SVG\logo_escritorio.svg')}}'>
    <meta name='og:site_name' content='Servicios Filológicos'>
    <meta name='og:description' content='servicios filologicos, filologia, tesis, español, correcciones, ortografia, correccion, clases'>
    

    <meta name='application-name' content='Servicios filológicos'>
    <meta name='og:email' content='info@serviciosfilologicos.com'>
    <meta name='og:phone_number' content='+50687295068'>

    <meta name='og:region' content='CR'>
    <meta name='og:country-name' content='CR'>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('public/css/global.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <link rel="stylesheet" href="{{ asset('public\build\assets\app-67dcdfd2.css') }}">

    <meta name="google-site-verification" content="SGgfor-1jYxz4fPnR7RHY_xDHSTMIRLQDKyBc-39Azs" />

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-F77ZDGF1HZ"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-F77ZDGF1HZ');
    </script>

    <!-- Scripts -->
    
</head>
<body>
    <div id="app">

        <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
            <div class="container mt-3 mb-3">
                <div class="navbar-brand d-flex" href="#">
                    <div class="d-flex">
                        <a href="/" class="icon_site">
                            <img src="{{asset('public\img\SVG\logo_escritorio.svg')}}" alt="logo" class="icons me-3 movile_desaparecer">
                            <img src="{{asset('public\img\SVG\logo.svg')}}" alt="logo" class="icons me-3 movil_view">
                        </a>
                        <a href="https://www.linkedin.com/in/fiorella-%C3%A1lvarez-ram%C3%ADrez-b1099878" target="_blank" class="movil_view">
                            <img src="{{asset('public\img\SVG\linke.svg')}}" class="icons" alt="">
                        </a>
                    </div>
                    <a class="movile_desaparecer" href="https://api.whatsapp.com/send?phone=50687295068" target="_blank">
                        <img src="{{asset('public\img\SVG\whatsapp.svg')}}" class="icons me-3" alt="">
                    </a>
                    <a href="https://www.linkedin.com/in/fiorella-%C3%A1lvarez-ram%C3%ADrez-b1099878" target="_blank" class="movile_desaparecer">
                        <img src="{{asset('public\img\SVG\linke.svg')}}" class="icons" alt="">
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 w-100 justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link text-white font-light {{ Request::routeIs('home_page') ? 'active' : '' }} uppercase" aria-current="page" href="/">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white font-light uppercase {{ Request::routeIs('about') ? 'active' : '' }}" href="{{route('about')}}">Acerca de</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white font-light uppercase {{ Request::routeIs('servicios_individual') ? 'active' : '' }} {{ Request::routeIs('servicios') ? 'active' : '' }}" href="{{route('servicios')}}">Servicios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white font-light {{ Request::routeIs('conozcanos_indivual') ? 'active' : '' }} {{ Request::routeIs('conozcanos') ? 'active' : '' }} uppercase" href="{{route('conozcanos')}}">Conozca +</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white font-light  {{ Request::routeIs('contacto') ? 'active' : '' }}  uppercase" href="{{route('contacto')}}">Contacto</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <a href="https://api.whatsapp.com/send?phone=50687295068" target="_blank" class="movil_view fixed_icon-whatsapp">
            <img src="{{asset('public\img\SVG\whatsapp.svg')}}" class="icons" alt="">
        </a>

        <div class="">
            @yield('content')
        </div>

        <footer class="d-flex justify-content-between py-4">
            <div class="container d-flex w-100 justify-content-between">
                <section>
                    <a class="text-black text-decoration-none font-light" href="mailto:info@serviciosfilologicos.com">info@serviciosfilologicos.com</a>
                </section>
                <section class="text-black font-light">
                    Escazú, San José
                </section>
                <section>
                    <a class="text-black font-light text-decoration-none" href="tel:50687295068">+506 8729 5068</a>
                </section>
            </div>
        </footer>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script src="{{asset('public/js/filter.js')}}"></script>
    <script src="{{asset('public/js/modal.js')}}"></script>
    <script src="{{asset('public/js/type.js')}}"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="{{asset('public/js/aos_entry_animation.js')}}"></script>
    <script src="{{asset('public/js/validation.js')}}"></script>
    <script src="{{asset('public\build\assets\app-903266c5.js')}}"></script>

</body>
</html>
