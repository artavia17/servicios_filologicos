@extends('public.layouts.public')

@section('content')

<main>
    <section class="background_video">
            <video autoplay muted loop>
                <source src="{{asset('video/video.mp4')}}" type="video/mp4">
            </video>
            <section class="pasta"></section>
    </section>
    <section class="content_center">
        <h1>Servicios filológicos</h1>
        <h2 class="secundary">Corrección de <span id="type"></span></h2>
    </section>
</main>

@endsection
