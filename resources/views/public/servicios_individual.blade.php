@extends('public.layouts.public')
@extends('public.layouts.footer')
@section('description', $data->meta_description)
@section('title',  '- ' . $data->title)
@section('content')

    <section class="servicios_individuales">

        <header class="" style="background-image: url('{{  $data->photo }}')">

            <div class="pasta_header">
                <div class="container m-auto">
                    <h1
                    >{{$data->title}}</h1>
                    <hr
                    >
                </div>
            </div>

        </header>

        <section class="content container py-5">
            <div
                class=" description text-white"
                data-aos="fade-up"
                data-aos-offset="200"
                data-aos-delay="0"
                data-aos-duration="1000"
                data-aos-easing="ease"
                data-aos-mirror="true"
                data-aos-once="true"
            >
                @php
                    echo $data->descripcion;
                @endphp
            </div>
            <div class="formulario_contacto"
                 data-aos="fade-up"
                 data-aos-offset="200"
                 data-aos-delay="0"
                 data-aos-duration="1000"
                 data-aos-easing="ease"
                 data-aos-mirror="true"
                 data-aos-once="true"
            >
                <h2>Contácteme</h2>
                <form action="{{route('send_email_services')}}">
                    <input type="hidden" value="{{$data->title}}" name="title">
                    <input type="text" info="Nombre completo" placeholder="Nombre completo"  name="name">
                    <input type="email" info="Correo electrónico" placeholder="Correo electrónico"  name="email">
                    <input type="tel" info="Número telefónico" placeholder="Número telefónico"  name="phone">
                    <textarea id="" info="Mensaje" cols="30" rows="4" placeholder="Mensaje"  name="description"></textarea>
                    <button>Enviar</button>
                </form>
            </div>
        </section>

        <section class="comments">

            <div class="container py-5">
                <h1 class="text-white"
                    data-aos="fade-up"
                    data-aos-offset="200"
                    data-aos-delay="0"
                    data-aos-duration="1000"
                    data-aos-easing="ease"
                    data-aos-mirror="true"
                    data-aos-once="true"
                >Comentarios</h1>

                <section class="users"
                         data-aos="fade-up"
                         data-aos-offset="200"
                         data-aos-delay="0"
                         data-aos-duration="1000"
                         data-aos-easing="ease"
                         data-aos-mirror="true"
                         data-aos-once="true"
                >

                    @if(count($comments) > 0)
                        @foreach($comments as $value)
                            <article class="comment_user">
                                <div class="name">
                                    <h2>{{$value->nombre}}</h2>
                                    <h3>{{$value->updated_at->diffForHumans()}}</h3>
                                </div>
                                <div class="comment">
                                    <p>{{$value->description}}</p>
                                </div>
                            </article>
                        @endforeach
                    @else
                        <p class="text-white mt-3">No hay comentarios, sé el primero en realizar un comentario.</p>
                    @endif


                </section>

                <h1 class="text-white mb-5"
                    data-aos="fade-up"
                    data-aos-offset="200"
                    data-aos-delay="0"
                    data-aos-duration="1000"
                    data-aos-easing="ease"
                    data-aos-mirror="true"
                    data-aos-once="true"
                >Deja tu comentario</h1>

                <form method="POST" action="{{route('new_comment')}}" class=" m-0 p-0 container row justify-content-between"
                      data-aos="fade-up"
                      data-aos-offset="200"
                      data-aos-delay="0"
                      data-aos-duration="1000"
                      data-aos-easing="ease"
                      data-aos-mirror="true"
                      data-aos-once="true"
                >

                    @csrf

                    <input type="hidden" name="id_service" value="{{$data->id}}">

                    <div class="mb-3 p-0 col-6 pe-4">
                        <input type="text" class="form-control text-white" name="name" id="exampleFormControlInput1" info="Nombre completo" placeholder="Nombre completo">
                    </div>
                    <div class="mb-3 p-0 col-6">
                        <input type="email" class="form-control text-white" name="email" id="exampleFormControlInput1" info="Correo electrónico" placeholder="Correo electrónico">
                    </div>
                    <div class="mb-3 p-0">
                        <textarea class="form-control" id="exampleFormControlTextarea1 text-white" name="description"  rows="8" info="Comentario" placeholder="Comentario"></textarea>
                    </div>

                    <button type="submit" class="">Comentar</button>

                </form>

            </div>

        </section>


        <section class="servicios_relacionados container py-5">

                <h2 class="mb-5"
                    data-aos="fade-up"
                    data-aos-offset="200"
                    data-aos-delay="0"
                    data-aos-duration="1000"
                    data-aos-easing="ease"
                    data-aos-mirror="true"
                    data-aos-once="true"
                >Servicios relacionados</h2>

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
                </div>

        </section>

    </section>

    @if(session('servicio_formulario'))

        <div class="modal_send_message">

            <div class="modal_content">
                <h2>Gracias por contactarnos</h2>
                <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                </svg>
                <p>¡Pronto nos pondremos en contacto con usted!</p>

                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                    </svg>
                </button>

            </div>

        </div>

    @endif

    @if(session('comentario_save'))

        <div class="modal_send_message">

            <div class="modal_content"  style="height: 320px;">
                <h2>Gracias por su comentario</h2>
                <svg xmlns="http://www.w3.org/2000/svg" width="90" height="90" fill="currentColor" class="bi bi-chat-right-dots-fill" viewBox="0 0 16 16">
                    <path d="M16 2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h9.586a1 1 0 0 1 .707.293l2.853 2.853a.5.5 0 0 0 .854-.353V2zM5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                </svg>
                <p class="mb-0">¡Su comentario es de gran utilidad para nosotros!</p>
                <p>Este comentario está en proceso de aprobación.</p>
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                    </svg>
                </button>

            </div>

        </div>

    @endif



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
