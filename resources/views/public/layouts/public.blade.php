<!doctype html>
<html lang="es-CR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Primary Meta Tags -->
    <title>@yield('title', 'Servicios Filológicos | Corrección de Tesis, Documentos y Clases de Español en Costa Rica')</title>
    <meta name="title" content="@yield('meta_title', 'Servicios Filológicos | Corrección de Tesis, Documentos y Clases de Español en Costa Rica')">
    <meta name="description" content="@yield('description', 'Ofrecemos servicios profesionales de revisión y corrección de tesis, documentos académicos, clases de español para extranjeros, tutorías y asesorías filológicas en Costa Rica.')">
    <meta name="keywords" content="servicios filológicos, corrección de tesis, corrección de documentos, clases de español, español para extranjeros, filología, ortografía, gramática, revisión académica, tutorías español, asesorías lingüísticas, Costa Rica, corrector profesional, edición de textos">
    <meta name="author" content="Servicios Filológicos">
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta name="language" content="Spanish">
    <meta name="revisit-after" content="7 days">
    <meta name="rating" content="general">

    <!-- Canonical URL -->
    <link rel="canonical" href="@yield('canonical', 'https://www.serviciosfilologicos.com')">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:url" content="@yield('og_url', 'https://www.serviciosfilologicos.com')">
    <meta property="og:title" content="@yield('og_title', 'Servicios Filológicos | Corrección de Tesis y Clases de Español')">
    <meta property="og:description" content="@yield('og_description', 'Servicios profesionales de revisión y corrección de tesis, documentos académicos, clases de español para extranjeros y asesorías filológicas en Costa Rica.')">
    <meta property="og:image" content="@yield('og_image', asset('public/img/logo-og.png'))">
    <meta property="og:image:secure_url" content="@yield('og_image', asset('public/img/logo-og.png'))">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="Logo Servicios Filológicos - Corrección de Tesis y Clases de Español">
    <meta property="og:site_name" content="Servicios Filológicos">
    <meta property="og:locale" content="es_CR">
    <meta property="og:locale:alternate" content="es_ES">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="@yield('twitter_url', 'https://www.serviciosfilologicos.com')">
    <meta name="twitter:title" content="@yield('twitter_title', 'Servicios Filológicos | Corrección de Tesis y Clases de Español')">
    <meta name="twitter:description" content="@yield('twitter_description', 'Servicios profesionales de revisión y corrección de tesis, documentos académicos, clases de español para extranjeros y asesorías filológicas en Costa Rica.')">
    <meta name="twitter:image" content="@yield('twitter_image', asset('public/img/logo-og.png'))">
    <meta name="twitter:image:alt" content="Logo Servicios Filológicos - Corrección de Tesis y Clases de Español">

    <!-- Contact & Business Information -->
    <meta name="contact" content="info@serviciosfilologicos.com">
    <meta name="geo.region" content="CR-SJ">
    <meta name="geo.placename" content="Escazú, San José">
    <meta name="geo.position" content="9.9281;-84.1397">
    <meta name="ICBM" content="9.9281, -84.1397">

    <!-- Favicon and Icons -->
    <link rel="icon" type="image/png" href="{{asset('public/img/logo-google.png')}}">
    <link rel="shortcut icon" href="{{asset('public/img/logo-google.png')}}">
    <link rel="apple-touch-icon" href="{{asset('public/img/logo-google.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('public/img/logo-google.png')}}">
    <link rel="manifest" href="{{asset('public/manifest.json')}}">

    <!-- Preconnect for Performance -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.bunny.net" crossorigin>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="dns-prefetch" href="//www.googletagmanager.com">

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Stylesheets -->
    <link href="{{ asset('public/css/global.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="{{ asset('public/build/assets/app-67dcdfd2.css') }}">

    <!-- Google Search Console Verification -->
    <meta name="google-site-verification" content="SGgfor-1jYxz4fPnR7RHY_xDHSTMIRLQDKyBc-39Azs" />

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-F77ZDGF1HZ"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-F77ZDGF1HZ');
    </script>

    <!-- Schema.org Structured Data (JSON-LD) -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "ProfessionalService",
      "name": "Servicios Filológicos",
      "image": "{{ asset('public/img/logo-google.png') }}",
      "logo": "{{ asset('public/img/logo-google.png') }}",
      "@id": "https://www.serviciosfilologicos.com",
      "url": "https://www.serviciosfilologicos.com",
      "telephone": "+50687295068",
      "email": "info@serviciosfilologicos.com",
      "priceRange": "$$",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Escazú",
        "addressLocality": "San José",
        "addressRegion": "San José",
        "postalCode": "10203",
        "addressCountry": "CR"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": 9.9281,
        "longitude": -84.1397
      },
      "openingHoursSpecification": {
        "@type": "OpeningHoursSpecification",
        "dayOfWeek": [
          "Monday",
          "Tuesday",
          "Wednesday",
          "Thursday",
          "Friday",
          "Saturday"
        ],
        "opens": "09:00",
        "closes": "18:00"
      },
      "sameAs": [
        "https://www.linkedin.com/in/fiorella-álvarez-ramírez-b1099878"
      ],
      "description": "Ofrecemos servicios profesionales de revisión y corrección de tesis, documentos académicos, clases de español para extranjeros, tutorías y asesorías filológicas en Costa Rica.",
      "areaServed": {
        "@type": "Country",
        "name": "Costa Rica"
      },
      "serviceType": [
        "Corrección de tesis",
        "Corrección de documentos",
        "Clases de español",
        "Tutorías académicas",
        "Asesorías filológicas"
      ]
    }
    </script>

    <!-- Additional Organization Schema -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "Servicios Filológicos",
      "alternateName": "Servicios Filológicos Costa Rica",
      "url": "https://www.serviciosfilologicos.com",
      "logo": "{{ asset('public/img/logo-google.png') }}",
      "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "+50687295068",
        "contactType": "customer service",
        "email": "info@serviciosfilologicos.com",
        "areaServed": "CR",
        "availableLanguage": ["Spanish", "English"]
      },
      "sameAs": [
        "https://www.linkedin.com/in/fiorella-álvarez-ramírez-b1099878"
      ]
    }
    </script>

    @yield('additional_schema')

</head>
<body>
    <div id="app">

        <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
            <div class="container mt-3 mb-3">
                <div class="navbar-brand d-flex" href="#">
                    <div class="d-flex">
                        <a href="/" class="icon_site" aria-label="Inicio - Servicios Filológicos">
                            <img src="{{asset('public/img/SVG/logo_escritorio.svg')}}" alt="Logo Servicios Filológicos - Corrección de tesis y clases de español" class="icons me-3 movile_desaparecer" width="150" height="50" loading="eager">
                            <img src="{{asset('public/img/SVG/logo.svg')}}" alt="Logo Servicios Filológicos" class="icons me-3 movil_view" width="40" height="40" loading="eager">
                        </a>
                        <a href="https://www.linkedin.com/in/fiorella-%C3%A1lvarez-ram%C3%ADrez-b1099878" target="_blank" rel="noopener noreferrer" class="movil_view" aria-label="Visitar perfil de LinkedIn">
                            <img src="{{asset('public/img/SVG/linke.svg')}}" class="icons" alt="LinkedIn Servicios Filológicos" width="30" height="30" loading="lazy">
                        </a>
                    </div>
                    <a class="movile_desaparecer" href="https://api.whatsapp.com/send?phone=50687295068" target="_blank" rel="noopener noreferrer" aria-label="Contactar por WhatsApp" style="display: flex; align-items: center;">
                        <img src="{{asset('public/img/SVG/whatsapp.svg')}}" class="icons me-3" alt="Contacto WhatsApp +506 8729 5068" width="30" height="30" loading="lazy">
                    </a>
                    <a href="https://www.linkedin.com/in/fiorella-%C3%A1lvarez-ram%C3%ADrez-b1099878" target="_blank" rel="noopener noreferrer" class="movile_desaparecer" aria-label="Visitar perfil de LinkedIn" style="display: flex; align-items: center;">
                        <img src="{{asset('public/img/SVG/linke.svg')}}" class="icons" alt="LinkedIn Servicios Filológicos" width="30" height="30" loading="lazy">
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

        <a href="https://api.whatsapp.com/send?phone=50687295068" target="_blank" rel="noopener noreferrer" class="movil_view fixed_icon-whatsapp" aria-label="Contactar por WhatsApp">
            <img src="{{asset('public/img/SVG/whatsapp.svg')}}" class="icons" alt="Contacto WhatsApp Servicios Filológicos" width="50" height="50" loading="lazy">
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
    <script src="{{asset('public/build/assets/app-903266c5.js')}}"></script>

</body>
</html>
