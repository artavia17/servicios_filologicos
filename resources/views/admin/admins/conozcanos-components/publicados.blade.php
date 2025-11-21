<div class="col-12 mt-4">

    @if(session('save'))

    <div class="alert alert-success  fade show d-flex justify-content-between" role="alert">
        <p class="pe-4 m-0">{{ Session::get('save') }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    @endif

    <div class=" p-0">
            <h3 >Conozcanos - Publicos</h3>
            <div class="table-responsive">
            <table class="table table-hoverable">
                <thead>
                <tr>
                    <th class="text-left">Titulo</th>
                    <th>Creación</th>
                    <th>Actualización</th>
                    <th>Reciclar servicio</th>
                    <th>Eliminar servicio</th>
                    <th>Ver</th>
                </tr>
                </thead>
                <tbody>

                    @if(count($data))
                        @foreach($data as $value)
                            <tr>

                                <td class="text-left">{{$value->title}}</td>

                                <td>{{$value->created_at->diffForHumans()}}</td>
                                <td>{{$value->updated_at->diffForHumans()}}</td>
                                <td>
                                    <a href="{{route('admin_individual_reciclar_conozca', $value->id)}}" class="mdc-button mdc-button--unelevated filled-button--warning mdc-ripple-upgraded p-3" >
                                        Reciclar
                                    </a>
                                </td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <a type="button" class="mdc-button mdc-button--unelevated filled-button--secondary mdc-ripple-upgraded p-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$value->id}}">
                                        Eliminar
                                    </a>

                                    <!-- Modal -->
                                    <div class="modal fade" id="staticBackdrop{{$value->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">¿Seguro que desea reciclar "{{$value->title}}"?</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-right d-flex">
                                            Al aceptar y eliminar este servicio ya no podrá recuperarlo.
                                        </div>
                                        <div class="modal-footer">
                                            <button class="mdc-button mdc-button--unelevated filled-button--light mdc-ripple-upgraded p-3" data-bs-dismiss="modal" type="button" >
                                                Cancelar
                                            </button>
                                            <a href="{{route('admin_individual_delete_conozca', $value->id)}}" class="mdc-button mdc-button--unelevated filled-button--secondary mdc-ripple-upgraded p-3">
                                                Aceptar y Eliminar
                                            </a>
                                        </div>
                                        </div>
                                    </div>
                                    </div>

                                </td>
                                <td>
                                    <a href="{{route('admin_individual_conozca', $value->slug)}}" class="mdc-button mdc-button--unelevated filled-button--success mdc-ripple-upgraded p-3">
                                        Ver
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                    @else
                        <tr>
                            <td colspan="7" class="text-center">No tenemos servicios que mostrar</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            </div>
        </div>


    </div>

</div>
