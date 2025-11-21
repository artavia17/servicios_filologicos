<div class="col-12 mt-4">

    <form method="POST" class="container" action="{{route('admin_individual_upddata_conozca', $data->slug)}}" enctype="multipart/form-data">
        @csrf
        <div class="d-flex justify-content-between mb-4">
            <h3>Conozcanos - {{$data->title}}</h3>
            <div>

                <button class="mdc-button me-2 mdc-button--unelevated filled-button--success mdc-ripple-upgraded" id="enviar_datos">Actualizar contenido</button>


                @if($data->status == 'public')

                    <a href="{{route('admin_individual_reciclar_conozca', $data->id)}}" class="mdc-button me-2 mdc-button--unelevated filled-button--warning mdc-ripple-upgraded p-3" >
                        Reciclar
                    </a>


                @else

                    <a href="{{route('admin_individual_publicar_conozca', $data->id)}}" class="mdc-button me-2 mdc-button--unelevated mdc-ripple-upgraded p-3" >
                        Publicar
                    </a>

                @endif

                <a type="button" class="mdc-button mdc-button--unelevated filled-button--secondary mdc-ripple-upgraded p-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$data->id}}">
                        Eliminar
                </a>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop{{$data->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">¿Seguro que desea reciclar "{{$data->title}}"?</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-right d-flex">
                            Al aceptar y eliminar ya no podrá recuperarlo.
                        </div>
                        <div class="modal-footer">
                            <button class="mdc-button mdc-button--unelevated filled-button--light mdc-ripple-upgraded p-3" data-bs-dismiss="modal" type="button" >
                                Cancelar
                            </button>
                            <a href="{{route('admin_individual_delete_conozca', $data->id)}}" class="mdc-button mdc-button--unelevated filled-button--secondary mdc-ripple-upgraded p-3">
                                Aceptar y Eliminar
                            </a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
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
                        <p class="arrastrar">Seleccione o arrastre la imagen destacada</p>
                            <img src="{{$data->photo}}" id="imagen_drag" alt=""/>
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
                        <input type="text" value="{{$data->title}}" class="form-control  @error('title') is-invalid @enderror" name="title">
                    @error('title')
                        <div id="validationServer03Feedback d-block" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3 col-12">
                    <label for="exampleInputPassword1" class="form-label">Meta descripción (Se recomienda colocar máximo 150 caracteres)</label>
                    <input type="text" class="form-control  @error('meta') is-invalid @enderror" value="{{$data->meta_description}}" name="meta">
                    @error('meta')
                    <div id="validationServer03Feedback d-block" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3 col-12">
                    <label for="exampleInputPassword1" class="form-label">Video YouTuve</label>
                        <input type="text" value="{{$data->video}}" class="form-control  @error('video') is-invalid @enderror" name="video">
                    @error('video')
                        <div id="validationServer03Feedback d-block" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3 col-12">
                    <label for="exampleInputPassword1" class="form-label">Descripcion</label>
                        <textarea class="form-control @error('contenido') is-invalid @enderror" name="contenido" id="full-featured">
                            {{$data->descripcion}}
                        </textarea>
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
