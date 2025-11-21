<div class="col-12 mt-4">

    <form method="POST" class="container" action="{{route('admin_servicios_create')}}" enctype="multipart/form-data">
        @csrf
        <div class="d-flex justify-content-between mb-4">
            <h3>Servicios - Nuevo</h3>
            <button class="mdc-button mdc-button--unelevated filled-button--success mdc-ripple-upgraded" id="enviar_datos">Agregar servicio</button>
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
                        <p class="arrastrar">Seleccione o arrastre la imagen de portada</p>
                            <img src="" id="imagen_drag" alt=""/>
                    </label>
                    <input type="file" onchange="send_video(this)" class="form-control d-none @error('imagen') is-invalid @enderror" name="imagen" id="file_input"/>
                    @error('imagen')
                        <div id="validationServer03Feedback d-block" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 col-12">
                    <label for="exampleInputPassword1" class="form-label">Titulo principal</label>
                        <input type="text" class="form-control  @error('title') is-invalid @enderror" name="title">
                    @error('title')
                        <div id="validationServer03Feedback d-block" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="mb-3 col-12">
                    <label for="exampleInputPassword1" class="form-label">Seleccione el orden</label>
                    <br/>
                    <select class="form-control" name="positicion">
                        <option value="0" selected >Insertar de primero (Por defecto)</option>
                        @for($i = 1; $i <= $count_servicios + 1; $i++)
                            <option value="{{$i}}" >{{$i}}</option>
                        @endfor
                    </select>
                    @error('title')
                    <div id="validationServer03Feedback d-block" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3 col-12">
                    <label for="exampleInputPassword1" class="form-label">Meta descripción (Se recomienda colocar máximo 150 caracteres)</label>
                    <input type="text" class="form-control  @error('meta') is-invalid @enderror" name="meta">
                    @error('meta')
                    <div id="validationServer03Feedback d-block" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>


                <div class="mb-3 col-12">
                    <label for="exampleInputPassword1" class="form-label">Descripcion</label>
                        <textarea class="form-control @error('contenido') is-invalid @enderror" name="contenido" id="full-featured"></textarea>
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
