@extends('public.layouts.public')
@extends('public.layouts.footer')

@section('title', 'Sobre Nosotros - Experta en Filología y Servicios Lingüísticos')
@section('meta_title', 'Sobre Nosotros - Experta en Filología y Servicios Lingüísticos')
@section('description', $data->meta_description ?? 'Conozca a nuestra experta en filología con amplia experiencia en corrección de tesis, documentos académicos y enseñanza del español.')
@section('canonical', url('/sobre-nosotros'))

@section('og_type', 'profile')
@section('og_url', url('/sobre-nosotros'))
@section('og_title', 'Sobre Nosotros - Experta en Filología')
@section('og_description', $data->meta_description ?? 'Conozca a nuestra experta en filología profesional.')
@section('og_image', $data->photo ?? asset('public/img/SVG/logo_escritorio.svg'))

@section('twitter_url', url('/sobre-nosotros'))
@section('twitter_title', 'Sobre Nosotros - Experta en Filología')
@section('twitter_description', $data->meta_description ?? 'Conozca a nuestra experta en filología profesional.')
@section('twitter_image', $data->photo ?? asset('public/img/SVG/logo_escritorio.svg'))

@section('additional_schema')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "AboutPage",
  "name": "Sobre Nosotros",
  "description": "{{ $data->meta_description ?? 'Información sobre nuestros servicios filológicos' }}",
  "url": "{{ url('/sobre-nosotros') }}",
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
        "name": "Sobre Nosotros",
        "item": "{{ url('/sobre-nosotros') }}"
      }
    ]
  }
}
</script>
@endsection

@section('content')

    <section class="about">

        <header class="movile_desaparecer" style="background-image: url('{{  $data->photo }}')">

            <div class="pasta_header">
                <div class="container m-auto">
                    <h1
                    >{{$data->title}}</h1>
                    <hr
                    >
                </div>
            </div>

        </header>

        <header class="movil_view">

            <img src="{{$data->photo}}" alt="{{$data->title ?? 'Sobre nosotros - Servicios Filológicos'}}" style="width: 100%;" loading="eager" width="800" height="600">

        </header>

        <section class="content py-5 px-3">
            <h1  data-aos="fade-up"
                 data-aos-offset="200"
                 data-aos-delay="0"
                 data-aos-duration="1000"
                 data-aos-easing="ease"
                 data-aos-mirror="true"
                 data-aos-once="true"
                class="px-3 movil_view">{{$data->title}}</h1>
            <hr  data-aos="fade-up"
                 data-aos-offset="200"
                 data-aos-delay="0"
                 data-aos-duration="1000"
                 data-aos-easing="ease"
                 data-aos-mirror="true"
                 data-aos-once="true"
                class="mx-3 mb-4 movil_view">
            <div  data-aos="fade-up"
                  data-aos-offset="200"
                  data-aos-delay="0"
                  data-aos-duration="1000"
                  data-aos-easing="ease"
                  data-aos-mirror="true"
                  data-aos-once="true"
                class="container text-white content_description">
                @php
                    echo $data->description;
                @endphp
            </div>

            <button class="movil_view view_more">Leer más</button>

        </section>

    </section>



@endsection

@yield('footer')
