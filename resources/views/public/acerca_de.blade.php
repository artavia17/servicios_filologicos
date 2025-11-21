@extends('public.layouts.public')
@extends('public.layouts.footer')
@section('description', $data->meta_description)
@section('title', '- Conozca a nuestra experta en filología')

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

            <img src="{{$data->photo}}" alt="" style="width: 100%;">

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
