

<form id="form" method="POST" action="{{ route('actualizar_home') }}" enctype="multipart/form-data">

    @csrf
    <div class="d-flex justify-content-between mb-4">
        <h3>Inicio</h3>
        <button class="mdc-button mdc-button--unelevated filled-button--success mdc-ripple-upgraded" id="enviar_datos">Actualizar Inicio</button>
    </div>

    @if(session('save'))

        <div class="alert alert-success  fade show d-flex justify-content-between" role="alert">
            <p class="pe-4 m-0">El registro se guardo con exito</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    @endif

    <div class="mb-3">
        <label for="file_input" class="form-label" id="dropbox" ondrop="drop_handler(event)" ondragover="dragover_handler(event)">
            <p class="arrastrar">
                Seleccione o arrastre el video
            </p>
            @if($data)
                <video class="rounded" id="view_video" src="{{ $data->video }}" autoplay muted loop></video>
            @else
                <video src="" id="view_video" muted autoplay loop></video>
            @endif
        </label>
        <input type="file" onchange="send_video(this)" class="form-control d-none  @error('video') is-invalid @enderror" name="video" id="file_input" aria-describedby="emailHelp">
        @error('video')
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror



    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Titulo principal</label>
        <input type="text" class="form-control  @error('title') is-invalid @enderror" value="@if($data) {{ $data->title }}  @endif" name="title" id="exampleInputPassword1">
        @error('title')
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Titulo secundario</label>
        <input type="text" class="form-control @error('subtitle') is-invalid @enderror" value="@if($data) {{ $data->subtitle }}  @endif" name="subtitle" id="exampleInputPassword1">
        @error('subtitle')
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Meta descripción (Se recomienda colocar máximo 150 caracteres)</label>
        <input type="text" class="form-control @error('meta') is-invalid @enderror" value="@if($data){{$data->meta_description}}@endif" name="meta" id="exampleInputPassword1">
        @error('meta')
        <div id="validationServer03Feedback" class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>


    <input type="hidden" name="typed" class="form-control" id="escritura_effect_value">
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Textos del efecto de escritura (Opcional)</label>
        <div class="api_effect_escritura">
            <div class="mb-3" id="content_effect_text">

                @if($typed_data)


                    <div class="d-flex align-items-center mb-3">
                        <label class="text-break" style="white-space: nowrap;">Nombre: </label>
                        <input type="text" class="form-control ms-3 input_type" id="0" value="{{ $typed_data[0]}}">
                    </div>


                    @php
                        $array_typed = array_shift($typed_data);
                    @endphp

                    @foreach($typed_data as $key => $value)

                        @if($value)
                            <div class="mb-3">
                                <div class="d-flex align-items-center data_effect">
                                    <label class="text-break" style="white-space: nowrap;">Nombre: </label>
                                    <input type="text" value="{{ $value }}" class="form-control ms-3 input_type" id="{{ $key + 1 }}" style="border-top-right-radius: 0px; border-bottom-right-radius: 0px">
                                    <button type="button" class="eliminar btn btn-primary" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px">-</button>
                                </div>
                            </div>
                        @endif

                    @endforeach



                @else
                    <div class="d-flex align-items-center mb-3">
                        <label class="text-break" style="white-space: nowrap;">Nombre: </label>
                        <input type="text" class="form-control ms-3 input_type" id="0">
                    </div>
                @endif

            </div>

            <button class="mdc-button mdc-button--raised mdc-ripple-upgraded pt-1" id="text_acomulativo">Agregar efecto escritura</button>
        </div>
    </div>

</form>
