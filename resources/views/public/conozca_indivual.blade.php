@extends('public.layouts.public')
@extends('public.layouts.footer')
@section('description', $data->meta_description)
@section('title', '- ' . $data->title)
@section('content')

    <section class="conozcanos_all">

        <section class="container my-5">

            <div class="row">
                <div class="video_last col-8">
                    <div
                    >
                        @if($data->video)
                            @php
                                echo $data->video;
                            @endphp
                        @else
                            <img style="width: 100%" src="{{$data->photo}}" alt="">
                        @endif
                    </div>


                    <h1 class="mt-4 mb-4"
                    >{{$data->title}}</h1>

                    <div
                    >
                        @php

                            echo $data->descripcion;

                        @endphp
                    </div>

                </div>

                <div class="col-4 all_content">
                    @foreach($all as $value)

                        <article>
                            <a href="{{route('conozcanos_indivual', $value->slug)}}">
                                <img src="{{$value->photo}}" alt="">
                                <div class="ver_mas">
                                    {{$value->title}}
                                </div>
                            </a>

                        </article>

                    @endforeach
                </div>
            </div>

        </section>

    </section>

    <style>

        .fixed-top{

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

        div#app {
            background: white !important;
        }

        html {
            background: white;
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
