
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Servicios Filológicos') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('public/css/auth/login.css') }}" rel="stylesheet">

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('public/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('public/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/vendors/jvectormap/jquery-jvectormap.css')}}">
    <!-- End plugin css for this page -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('public/assets/css/demo/style.css')}}">
    <!-- End layout styles -->
    <link rel="icon" href="{{asset('public\img\SVG\logo_escritorio.svg')}}" sizes="32x32">

</head>
    <body>


        <script src="{{asset('public/assets/js/preloader.js')}}"></script>
        <div class="body-wrapper">
            <div class="main-wrapper">
            <div class="page-wrapper full-page-wrapper d-flex align-items-center justify-content-center">
                <main class="auth-page">
                <div class="mdc-layout-grid">
                    <div class="mdc-layout-grid__inner">
                    <div class="stretch-card mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-1-tablet"></div>
                    <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-6-tablet">
                        <div class="mdc-card">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mdc-layout-grid">
                            <div class="mdc-layout-grid__inner">
                                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                                    <div class="mdc-text-field w-100">
                                        <input autocomplete="off" type="text" class="mdc-text-field__input @error('email') is-invalid @enderror" id="text-field-hero-input" name="email" value="{{ old('email') }}" required  autofocus>
                                        <div class="mdc-line-ripple"></div>
                                        <label for="text-field-hero-input" class="mdc-floating-label">{{ __('Correo electrónico') }}</label>
                                    </div>
                                </div>
                                @error('email')
                                    <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                                        <span class="invalid-feedback d-block p-0" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    </div>
                                @enderror
                                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                                    <div class="mdc-text-field w-100">
                                        <input class="mdc-text-field__input @error('password') is-invalid @enderror" type="password" id="text-field-hero-input" name="password" autocomplete="off">
                                        <div class="mdc-line-ripple"></div>
                                        <label for="text-field-hero-input" class="mdc-floating-label">{{ __('Contraseña') }}</label>
                                    </div>
                                </div>
                                @error('password')
                                    <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                                        <span class="invalid-feedback d-block p-0" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    </div>
                                @enderror
                                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                                <div class="mdc-form-field">
                                    <div class="mdc-checkbox">
                                    <input type="checkbox"
                                            class="mdc-checkbox__native-control"
                                            id="checkbox-1"/>
                                    <div class="mdc-checkbox__background">
                                        <svg class="mdc-checkbox__checkmark"
                                            viewBox="0 0 24 24">
                                        <path class="mdc-checkbox__checkmark-path"
                                                fill="none"
                                                d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                        </svg>
                                        <div class="mdc-checkbox__mixedmark"></div>
                                    </div>
                                    </div>
                                    <label for="checkbox-1">Recuérdame</label>
                                </div>
                                </div>
                                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop d-flex align-items-center justify-content-end">
                                <a href="{{ route('password.request') }}">¿Ha olvidado su contraseña?</a>
                                </div>
                                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                                <button type="submit" class="mdc-button mdc-button--raised pt-1 w-100">
                                    Iniciar sesión
                                </button>
                                </div>
                            </div>
                            </div>
                        </form>
                        </div>
                    </div>
                    <div class="stretch-card mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-1-tablet"></div>
                    </div>
                </div>
                </main>
            </div>
            </div>
        </div>



    </body>
    <script src="{{asset('public/js/array_text.js')}}"></script>
    <!-- plugins:js -->
    <script src="{{asset('public/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="{{asset('public/assets/vendors/chartjs/Chart.min.js')}}"></script>
    <script src="{{asset('public/assets/vendors/jvectormap/jquery-jvectormap.min.js')}}"></script>
    <script src="{{asset('public/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{asset('public/assets/js/material.js')}}"></script>
    <script src="{{asset('public/assets/js/misc.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{asset('public/assets/js/dashboard.js')}}"></script>
    <!-- End custom js for this page-->

</html>
