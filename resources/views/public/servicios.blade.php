@extends('public.layouts.public')
@extends('public.layouts.footer')
@section('description', $data->meta_description)
@section('title', 'Servicios')
@section('content')

    <section class="servicios_portada">

        <header class="movile_desaparecer">

            <div class="contenido">
                <div class="container pasta_header m-auto">
                    <h1>{{$data->title}}</h1>
                    <hr
                    />
                    <div
                    style="margin-bottom: 32px;"
                    >
                        @php
                            echo $data->description;
                        @endphp
                    </div>
                    <a
                    href="#servicios" class="view_services">Mostrar servicios</a>
                </div>

            </div>

            <div class="image">
                <img src="{{$data->photo}}" alt="Imagen de servicios">
            </div>

        </header>

        <header class="movil_view">

            <img src="{{$data->photo}}" alt="" style="width: 100%">

            <div class="container header_movile_servicios mt-3 mb-3 py-3">
                <h1
                >{{$data->title}}</h1>
                <hr
                >
                <div
                    class="description_movile_services"
                >
                    @php
                        echo $data->description;
                    @endphp

                </div>
                <a  
                    class="botton_view_new_services"
                    href="#servicios" class="view_services">Mostrar servicios</a>
            </div>


        </header>

        <section class="content container contenido_cursos py-5" id="servicios">
            <div class="filtros">
                <div
                    data-aos="fade-up"
                    data-aos-offset="200"
                    data-aos-delay="0"
                    data-aos-duration="1000"
                    data-aos-easing="ease"
                    data-aos-mirror="true"
                    data-aos-once="true"
                >
                    <h2 class="mb-4">Filtros</h2>
                    <div class="mb-4">
                        <h3>Filtrar por antiguedad</h3>

                        <label for="recientes" class="d-flex align-items-center mb-2">
                            <input type="radio" slug="reciente" @if(isset($_GET['filter-one']) && $_GET['filter-one'] == 'reciente') checked @endif  @if(isset($_GET['filter-two']) && $_GET['filter-two'] == 'reciente') checked @endif name="anguedad" id="recientes" class="me-2 change_filter">
                            Más recientes
                        </label>
                        <label for="antiguo" class="d-flex mb-2 align-items-center">
                            <input type="radio" slug="antiguo"  name="anguedad" id="antiguo" @if(isset($_GET['filter-one']) && $_GET['filter-one'] == 'antiguo') checked @endif  @if(isset($_GET['filter-two']) && $_GET['filter-two'] == 'antiguo') checked @endif class="me-2 change_filter">
                            Más antiguos
                        </label>
                    </div>

                    <div class="mb-4">
                        <h3>Filtrar por orden</h3>
                        <label for="a-z" class="d-flex mb-2 align-items-center">
                            <input type="radio" name="orden" slug="a-z" @if(isset($_GET['filter-one']) && $_GET['filter-one'] == 'a-z') checked @endif  @if(isset($_GET['filter-two']) && $_GET['filter-two'] == 'a-z') checked @endif id="a-z" class="me-2 change_filter">
                            Orden de A-Z
                        </label>
                        <label for="z-a" class="d-flex mb-2 align-items-center">
                            <input type="radio" name="orden" slug="z-a" @if(isset($_GET['filter-one']) && $_GET['filter-one'] == 'z-a') checked @endif  @if(isset($_GET['filter-two']) && $_GET['filter-two'] == 'z-a') checked @endif  id="z-a" class="me-2 change_filter">
                            Orden de Z-A
                        </label>
                    </div>
                </div>
            </div>


            <div class="cursos_all container">
                    @foreach($services as $value)
                        <article
                                data-aos="fade-up"
                                data-aos-offset="200"
                                data-aos-delay="0"
                                data-aos-duration="1000"
                                data-aos-easing="ease"
                                data-aos-mirror="true"
                                data-aos-once="true"
                        >
                            <a href="{{route('servicios_individual', $value->slug)}}" class="text-decoration-none">
                                <div class="mb-2">
                                    <img src="{{$value->photo}}" alt="">
                                </div>
                                <h3 class="text-black">{{$value->title}}</h3>
                                <button class="w-100 mt-2 py-2 text-white">INFORMACIÓN</button>
                            </a>
                        </article>
                    @endforeach
                <section class="pagination">
                    {{ $services->links() }}
                </section>

            </div>

        </section>

    </section>

    <style>

        .fixed-top{
            /*position: relative; !important;*/
            background: black;
        }

        nav .mt-3{
            margin-bottom: 1rem !important;
        }

        footer{
            background: black !important;
            padding: 0px 153px !important;
        }

        a.text-black.font-light.text-decoration-none,
        section.text-black.font-light{
            color: white !important;
        }

        @media (max-width: 700px) {
            .fixed-top{
                background: white !important;
            }

            footer{
                padding: 0px !important;
            }
        }

    </style>

@endsection

@yield('footer')
