@extends('public.layouts.public')

@section('title', 'Contacto - Servicios Filológicos | Solicite una Cotización')
@section('meta_title', 'Contacto - Servicios Filológicos | Solicite una Cotización')
@section('description', $meta ?? 'Contáctenos para solicitar información sobre nuestros servicios de corrección de tesis, documentos y clases de español. Estamos ubicados en Escazú, San José, Costa Rica.')
@section('canonical', url('/contacto'))

@section('og_type', 'website')
@section('og_url', url('/contacto'))
@section('og_title', 'Contacto - Servicios Filológicos')
@section('og_description', $meta ?? 'Contáctenos para solicitar información sobre nuestros servicios filológicos profesionales.')

@section('twitter_url', url('/contacto'))
@section('twitter_title', 'Contacto - Servicios Filológicos')
@section('twitter_description', $meta ?? 'Contáctenos para solicitar información sobre nuestros servicios filológicos profesionales.')

@section('additional_schema')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "ContactPage",
  "name": "Contacto",
  "description": "{{ $meta ?? 'Contáctenos para más información' }}",
  "url": "{{ url('/contacto') }}",
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
        "name": "Contacto",
        "item": "{{ url('/contacto') }}"
      }
    ]
  }
}
</script>
@endsection

@section('content')

    <main>
        <section class="background_video" style="background-image: url('{{asset('public/img/contacto.jpg')}}')">
                <section class="pasta"></section>
        </section>
        <section class="content_center">

                <h1 class="contacta"
                    data-aos="fade-up"
                    data-aos-offset="0"
                    data-aos-delay="0"
                    data-aos-duration="1000"
                    data-aos-easing="ease"
                    data-aos-mirror="true"
                    data-aos-once="true"
                >Contácteme</h1>

                <form action="{{route('send_form_contact')}}"
                      class=" form-contact my-5 py-4 container row justify-content-between"
                      data-aos="fade-up"
                      data-aos-offset="0"
                      data-aos-delay="0"
                      data-aos-duration="1000"
                      data-aos-easing="ease"
                      data-aos-mirror="true"
                      data-aos-once="true"
                >

                    <div class="mb-3 p-0 col-6 pe-4 input_file">
                        <input type="text" class="form-control text-white" name="name" id="contactName" info="Nombre completo" placeholder="Nombre completo" aria-label="Nombre completo" required>
                        <input type="email" class="form-control text-white" name="email" id="contactEmail" info="Correo electrónico" placeholder="Correo electrónico" aria-label="Correo electrónico" required>
                        <input type="tel" class="form-control text-white" name="phone" id="contactPhone" info="Número telefónico" placeholder="Número telefónico" aria-label="Número telefónico" required>
                    </div>
                    <div class="mb-3 p-0 col-6">
                        <textarea class="form-control text-white" id="contactMessage" name="description" rows="8" info="Comentario" placeholder="Comentario" aria-label="Comentario o mensaje" required></textarea>
                    </div>
                    
                    <div class="mb-3">
                        {!! NoCaptcha::renderJs() !!}
                        {!! NoCaptcha::display() !!}
                    </div>
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="m-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <button type="submit" class="" aria-label="Enviar formulario de contacto">Enviar</button>

                </form>

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

    @if(session('contacto_formulario'))

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

    <style>

        @media (min-width: 700px) {
            html{
                overflow: hidden;
            }
        }

        @media (max-width: 700px){
            footer {
                background: black;
            }

            main {
                height: 92vh !important;

            }

            .background_video{
                background-position: 80%;
            }

        }

    </style>

@endsection
