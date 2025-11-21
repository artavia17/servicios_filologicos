<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Servicios Filológicos - Administrador') }}</title>

    <!-- Fonts -->

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('public/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/admin/global.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('public/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/vendors/jvectormap/jquery-jvectormap.css')}}">
    <!-- End plugin css for this page -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('public/assets/css/demo/style.css')}}">
    <!-- End layout styles -->
    <link rel="icon" href="{{asset('public\img\SVG\logo_escritorio.svg')}}" sizes="32x32">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.2/datatables.min.css"/>

    <link rel="stylesheet" href="{{ asset('public\build\assets\app-67dcdfd2.css') }}">

    
</head>
<body>
    <div id="app">

        <script src="{{asset('public/assets/js/preloader.js')}}"></script>
        <div class="body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <aside class="mdc-drawer mdc-drawer--dismissible mdc-drawer--open">
            <div class="mdc-drawer__header">
                <a href="/home" class="brand-logo text-center">
                <img src="{{asset('public\img\SVG\logo_escritorio.svg')}}" alt="logo" width="80">
                </a>
            </div>
            <div class="mdc-drawer__content">
                @if(auth()->user()->type == 'admin' || auth()->user()->type == 'super-admin')
                    <div class="mdc-list-group">
                        <nav class="mdc-list mdc-drawer-menu ">
                            <div class="mdc-list-item mdc-drawer-item">
                                <a class="mdc-drawer-link " href="{{ route('home') }}">
                                    <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">home</i>
                                    Inicio
                                </a>
                            </div>
                            <div class="mdc-list-item mdc-drawer-item">
                                <a class="mdc-drawer-link" href="{{route('about_admin')}}">
                                    <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">info</i>
                                    Sobre nosotros
                                </a>
                            </div>
                            <div class="mdc-list-item mdc-drawer-item">
                                <a class="mdc-expansion-panel-link " href="#" data-toggle="expansionPanel" data-target="ui-sub-menu">
                                    <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">class</i>
                                        Servicios
                                    <i class="mdc-drawer-arrow material-icons">chevron_right</i>
                                </a>
                                <div class="mdc-expansion-panel" id="ui-sub-menu">
                                    <nav class="mdc-list mdc-drawer-submenu">
                                        <div class="mdc-list-item mdc-drawer-item">
                                            <a class="mdc-drawer-link " href="{{route('admin_servicios_portada')}}">
                                                Portada
                                            </a>
                                        </div>
                                        <div class="mdc-list-item mdc-drawer-item">
                                            <a class="mdc-drawer-link " href="{{route('comments')}}">
                                                Comentarios
                                            </a>
                                        </div>
                                        <div class="mdc-list-item mdc-drawer-item">
                                            <a class="mdc-drawer-link" href="{{route('admin_servicios_nuevo')}}">
                                                Agregar
                                            </a>
                                        </div>
                                        <div class="mdc-list-item mdc-drawer-item">
                                            <a class="mdc-drawer-link" href="{{route('admin_servicios_public')}}">
                                                Publicados
                                            </a>
                                        </div>
                                        <div class="mdc-list-item mdc-drawer-item">
                                            <a class="mdc-drawer-link" href="{{route('admin_servicios_papelera')}}">
                                                Papelera
                                            </a>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                            <div class="mdc-list-item mdc-drawer-item">
                                <a class="mdc-expansion-panel-link " href="#" data-toggle="expansionPanel" data-target="ui-sub-menu_conozca">
                                    <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">more</i>
                                        Conozca +
                                    <i class="mdc-drawer-arrow material-icons">chevron_right</i>
                                </a>
                                <div class="mdc-expansion-panel" id="ui-sub-menu_conozca">
                                    <nav class="mdc-list mdc-drawer-submenu">
                                        <div class="mdc-list-item mdc-drawer-item">
                                            <a class="mdc-drawer-link" href="{{route('admin_agregar_conozca')}}">
                                                Agregar
                                            </a>
                                        </div>
                                        <div class="mdc-list-item mdc-drawer-item">
                                            <a class="mdc-drawer-link" href="{{route('admin_public_conozca')}}">
                                                Publicados
                                            </a>
                                        </div>
                                        <div class="mdc-list-item mdc-drawer-item">
                                            <a class="mdc-drawer-link" href="{{route('admin_papelera_conozca')}}">
                                                Papelera
                                            </a>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                            <div class="mdc-list-item mdc-drawer-item">
                                <a class="mdc-drawer-link " href="{{ route('all_users') }}">
                                    <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">face</i>
                                    Usuarios
                                </a>
                            </div>
                        </nav>
                    </div>
                @endif

                <div class="profile-actions">
                <a href="/">Principal</a>
                <span class="divider"></span>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Cerrar sesión') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                </div>
            </div>
            </aside>
            <!-- partial -->
            <div class="main-wrapper mdc-drawer-app-content">
            <!-- partial:partials/_navbar.html -->
            <header class="mdc-top-app-bar">
                <div class="mdc-top-app-bar__row">
                <div class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
                    <button class="material-icons mdc-top-app-bar__navigation-icon mdc-icon-button sidebar-toggler">menu</button>
                </div>
                <div class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end mdc-top-app-bar__section-right">
                    <div class="menu-button-container menu-profile d-none d-md-block">
                    <button class="mdc-button mdc-menu-button">
                        <span class="d-flex align-items-center">
                        <span class="figure">
                            <img src="{{asset('public/assets/images/faces/face1.png')}}" alt="user" class="user">
                        </span>
                        <span class="user-name">{{ Auth::user()->name }}</span>
                        </span>
                    </button>
                    <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                        <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                        <li class="mdc-list-item cambiar_contrasena" role="menuitem">
                            <div class="item-thumbnail item-thumbnail-icon-only">
                            <i class="mdi mdi-account-edit-outline text-primary"></i>
                            </div>
                            <div class="item-content d-flex align-items-start flex-column justify-content-center" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <a href="{{route('all_users')}}" class="item-subject text-decoration-none text-black font-weight-normal">Cambiar contraseña</a>
                            </div>
                        </li>

                        <li class="mdc-list-item" role="menuitem">
                            <div class="item-thumbnail item-thumbnail-icon-only">
                            <i class="mdi mdi-logout-variant text-primary"></i>
                            </div>
                            <div class="item-content d-flex align-items-start flex-column justify-content-center">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Cerrar sesión') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        </ul>
                    </div>
                    </div>
                </div>
                </div>
            </header>
            <!-- partial -->
            <div class="page-wrapper mdc-toolbar-fixed-adjust">
                <main class="content-wrapper">


                    @yield('content')


                </main>
                <!-- partial:partials/_footer.html -->
                <footer>
                <div class="mdc-layout-grid">
                    <div class="mdc-layout-grid__inner">
                    <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                        <span class="text-center text-sm-left d-block d-sm-inline-block tx-14">Copyright © <a href="https://www.bootstrapdash.com/" target="_blank">Servicios Filologicos</a> 2023</span>
                    </div>
                    </div>
                </div>
                </footer>
                <!-- partial -->
            </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.tiny.cloud/1/pondln0cc0o5roku1x9h2fq45he0mj4hw00jm2boz7dioodk/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

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
    <script src="{{asset('public/js/drag.js')}}"></script>
    <script src="{{asset('public/js/edition_text.js')}}"></script>
    <script src="{{asset('public/js/new_password.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/micromodal/dist/micromodal.min.js"></script>
    <!-- or -->
    <script src="https://unpkg.com/micromodal/dist/micromodal.min.js"></script>

    <script src="{{asset('public\build\assets\app-903266c5.js')}}"></script>

    <!-- End custom js for this page-->
</body>
</html>
