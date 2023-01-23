
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
    <link href="{{ asset('css/auth/login.css') }}" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
    <body>
        <div class="container w-100 h-100 d-flex justify-content-center align-items-center">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card border-none rounded p-4">
                        <a href="/" class="card-header bg-white border-none d-flex justify-content-center">
                            <img src="{{asset('img/SVG/logo.svg')}}">
                        </a>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="email" class="col-md-12 col-form-label">{{ __('Correo electrónico') }}</label>

                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn w-100 btn_orange">
                                            {{ __('Enviar enlace de restablecimiento de contraseña') }}
                                        </button>
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="d-flex justify-content-between">
                                            <a class="btn btn-link btn-link-orange p-0 m-0 text-decoration-none" href="{{ route('login') }}">
                                                {{ __('Iniciar Sesión') }}
                                            </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
