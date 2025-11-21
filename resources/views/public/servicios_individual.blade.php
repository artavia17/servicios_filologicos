@extends('public.layouts.public')
@extends('public.layouts.footer')

@section('title', $data->title . ' - Servicios Filológicos')
@section('meta_title', $data->title . ' - Servicios Filológicos Costa Rica')
@section('description', $data->meta_description ?? 'Servicio profesional de ' . strtolower($data->title) . ' en Costa Rica. Calidad garantizada y atención personalizada.')
@section('canonical', url('/servicios/' . $data->slug))

@section('og_type', 'article')
@section('og_url', url('/servicios/' . $data->slug))
@section('og_title', $data->title . ' - Servicios Filológicos')
@section('og_description', $data->meta_description ?? 'Servicio profesional de ' . strtolower($data->title))
@section('og_image', $data->photo)

@section('twitter_url', url('/servicios/' . $data->slug))
@section('twitter_title', $data->title . ' - Servicios Filológicos')
@section('twitter_description', $data->meta_description ?? 'Servicio profesional de ' . strtolower($data->title))
@section('twitter_image', $data->photo)

@section('additional_schema')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Service",
  "name": "{{ $data->title }}",
  "description": "{{ strip_tags($data->meta_description ?? $data->descripcion) }}",
  "provider": {
    "@type": "ProfessionalService",
    "name": "Servicios Filológicos",
    "url": "{{ url('/') }}",
    "telephone": "+50687295068",
    "address": {
      "@type": "PostalAddress",
      "addressLocality": "San José",
      "addressRegion": "San José",
      "addressCountry": "CR"
    }
  },
  "areaServed": {
    "@type": "Country",
    "name": "Costa Rica"
  },
  "availableChannel": {
    "@type": "ServiceChannel",
    "serviceUrl": "{{ url('/servicios/' . $data->slug) }}"
  },
  "image": {
    "@type": "ImageObject",
    "url": "{{ $data->photo }}",
    "caption": "{{ $data->title }} - Servicio profesional de filología",
    "contentUrl": "{{ $data->photo }}",
    "name": "{{ $data->title }}",
    "description": "Imagen del servicio de {{ strtolower($data->title) }} ofrecido por Servicios Filológicos en Costa Rica"
  },
  "breadcrumb": {
    "@type": "BreadcrumbList",
    "itemListElement": [
      {
        "@type": "ListItem",
        "position": 1,
        "name": "Inicio",
        "item": "{{ url('/') }}"
      },
      {
        "@type": "ListItem",
        "position": 2,
        "name": "Servicios",
        "item": "{{ url('/servicios') }}"
      },
      {
        "@type": "ListItem",
        "position": 3,
        "name": "{{ $data->title }}",
        "item": "{{ url('/servicios/' . $data->slug) }}"
      }
    ]
  }
}
</script>
@if(count($comments) > 0)
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "AggregateRating",
  "itemReviewed": {
    "@type": "Service",
    "name": "{{ $data->title }}"
  },
  "ratingCount": "{{ count($comments) }}",
  "reviewCount": "{{ count($comments) }}"
}
</script>
@endif
@endsection

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
                <form action="{{route('send_email_services')}}" aria-label="Formulario de contacto para {{$data->title}}">
                    <input type="hidden" value="{{$data->title}}" name="title">
                    <input type="text" info="Nombre completo" placeholder="Nombre completo" name="name" aria-label="Nombre completo" required>
                    <input type="email" info="Correo electrónico" placeholder="Correo electrónico" name="email" aria-label="Correo electrónico" required>
                    <input type="tel" info="Número telefónico" placeholder="Número telefónico" name="phone" aria-label="Número telefónico" required>
                    <textarea info="Mensaje" cols="30" rows="4" placeholder="Mensaje" name="description" aria-label="Mensaje" required></textarea>
                    <button type="submit" aria-label="Enviar consulta sobre {{$data->title}}">Enviar</button>
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
                            <article class="comment_user" itemscope itemtype="https://schema.org/Review">
                                <div class="name">
                                    <h2 itemprop="author" itemscope itemtype="https://schema.org/Person">
                                        <span itemprop="name">{{$value->nombre}}</span>
                                    </h2>
                                    <h3>
                                        <time itemprop="datePublished" datetime="{{$value->updated_at->format('Y-m-d')}}">
                                            {{$value->updated_at->diffForHumans()}}
                                        </time>
                                    </h3>
                                </div>
                                <div class="comment">
                                    <p itemprop="reviewBody">{{$value->description}}</p>
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
                        <input type="text" class="form-control text-white" name="name" id="commentName" info="Nombre completo" placeholder="Nombre completo" aria-label="Nombre completo" required>
                    </div>
                    <div class="mb-3 p-0 col-6">
                        <input type="email" class="form-control text-white" name="email" id="commentEmail" info="Correo electrónico" placeholder="Correo electrónico" aria-label="Correo electrónico" required>
                    </div>
                    <div class="mb-3 p-0">
                        <textarea class="form-control text-white" id="commentText" name="description" rows="8" info="Comentario" placeholder="Comentario" aria-label="Comentario" required></textarea>
                    </div>

                    <button type="submit" class="" aria-label="Enviar comentario">Comentar</button>

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
                            itemscope
                            itemtype="https://schema.org/Service"
                            data-aos="fade-up"
                            data-aos-offset="200"
                            data-aos-delay="0"
                            data-aos-duration="1000"
                            data-aos-easing="ease"
                            data-aos-mirror="true"
                            data-aos-once="true"
                        >
                            <a href="{{route('servicios_individual', $value->slug)}}" class="text-decoration-none" itemprop="url">
                                <div class="mb-2">
                                    <img src="{{$value->photo}}" alt="{{$value->title}} - Servicio filológico" itemprop="image" loading="lazy" width="400" height="300">
                                </div>
                                <h3 class="text-black" itemprop="name">{{$value->title}}</h3>
                                <button class="w-100 mt-2 py-2 text-white" aria-label="Ver información de {{$value->title}}">INFORMACIÓN</button>
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
