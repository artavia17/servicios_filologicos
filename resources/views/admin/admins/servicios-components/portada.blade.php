<div class="col-12 mt-4">

    <form method="POST" class="container" enctype="multipart/form-data">
        @csrf
        <div class="d-flex justify-content-between mb-4">
            <h3>Servicios - Inicio</h3>
            <button class="mdc-button mdc-button--unelevated filled-button--success mdc-ripple-upgraded" id="enviar_datos">Actualizar portada</button>
        </div>

        @if(session('save'))

            <div class="alert alert-success  fade show d-flex justify-content-between" role="alert">
                <p class="pe-4 m-0">El registro se guardo con exito</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        @endif

        <div class="mt-5 row m-auto">
            <div id="form" method="post" action="{{ route('about_admin_update') }}" enctype="multipart/form-data">
                <div class="mb-3 col-12">
                    <label for="file_input" class="form-label" id="dropbox" ondrop="drop_handler(event)" ondragover="dragover_handler(event)">
                        <p class="arrastrar">Seleccione o arrastre la imagen</p>
                        @if($data)
                            <img src="{{$data->photo}}" id="imagen_drag" alt=""/>
                        @else
                            <img src="" id="imagen_drag" alt=""/>
                        @endif
                    </label>
                    <input type="file" onchange="send_video(this)" class="form-control d-none @error('imagen_nosotros') is-invalid @enderror" name="imagen_nosotros" id="file_input"/>
                    @error('imagen_nosotros')
                        <div id="validationServer03Feedback d-block" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 col-12">
                    <label for="exampleInputPassword1" class="form-label">Titulo principal</label>

                    @if($data)
                        <input type="text" class="form-control  @error('title') is-invalid @enderror" value="{{$data->title}}" name="title">
                    @else
                        <input type="text" class="form-control  @error('title') is-invalid @enderror" name="title">
                    @endif

                    @error('title')
                        <div id="validationServer03Feedback d-block" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3 col-12">
                    <label for="exampleInputPassword1" class="form-label">Meta descripción (Se recomienda colocar máximo 150 caracteres)</label>

                    @if($data)
                        <input type="text" class="form-control  @error('meta') is-invalid @enderror" value="{{$data->meta_description}}" name="meta">
                    @else
                        <input type="text" class="form-control  @error('meta') is-invalid @enderror" name="meta">
                    @endif

                    @error('meta')
                    <div id="validationServer03Feedback d-block" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3 col-12">
                    <label for="exampleInputPassword1" class="form-label">Descripcion</label>
                    @if($data)
                        <textarea class="form-control @error('contenido') is-invalid @enderror" name="contenido" id="full-featured">{{$data->description}}</textarea>
                    @else
                        <textarea class="form-control @error('contenido') is-invalid @enderror" name="contenido" id="full-featured"></textarea>
                    @endif


                    @error('contenido')
                        <div id="validationServer03Feedback d-block" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>


        </div>

    </form>

</div>
