@extends('public.layouts.public')
@section('title', ', corrección de tesis y clases español')
@section('description', $data->meta_description)
@section('content')

<main>
    <section class="background_video">
        @if($data)
            <video autoplay muted loop>
                <source src="{{ $data->video }}" type="video/mp4">
            </video>
            <section class="pasta"></section>
        @endif
    </section>
    <section class="content_center">
        @if($data)
            <h1
                data-aos="fade-up"
                data-aos-offset="200"
                data-aos-delay="0"
                data-aos-duration="1000"
                data-aos-easing="ease"
                data-aos-mirror="true"
                data-aos-once="true"
            >{{ $data->title}}</h1>
            <h2
                class="secundary"
                data-aos="fade-up"
                data-aos-offset="200"
                data-aos-delay="400"
                data-aos-duration="1000"
                data-aos-easing="ease"
                data-aos-mirror="true"
                data-aos-once="true"
            >
                <!--{{ $data->subtitle }} -->
                <span class="typed"></span></h2>
            <div class="titulo" id="cadenas-texto">
                @if($type_text)
                    @foreach($type_text as $value)
                        <i class="mascota">{{$value}}</i>
                    @endforeach
                @endif
            </div>
        @endif
    </section>

    <footer class="fixed-bottom container d-flex justify-content-between py-4">

        <section>
            <a class="text-white text-decoration-none font-light" href="mailto:info@serviciosfilologicos.com">info@serviciosfilologicos.com</a>
        </section>
        <section class="text-white font-light">
            Escazú, San José
        </section>
        <section>
            <a class="text-white font-light text-decoration-none" href="tel:50687295068">+506 8729 5068</a>
        </section>
    </footer>

</main>

<style>

    @media (min-width: 700px) {
        html{
            overflow: hidden;
        }
    }

    @media (max-width: 700px){

        html{


        }

        footer {
            background: black;
        }
    }
</style>

@endsection
