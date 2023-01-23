<div class="container h-100">
    <div class="row justify-content-between">
        <div class="col-3 bg-white p-4 rounded">
            <h3>Solicitudes de acceso</h3>
            @if(session('message'))
                <div class="alert alert-success" role="alert">
                    {{session('message')}}
                </div>
            @endif
            <div class=" h-100 overflow-auto">

                @if(count($accesos))

                    @foreach($accesos as $value)

                        <div class="card w-100 mb-4" >
                            <div class="card-body">
                                <h5 class="card-title mb-3">Nueva solicitud de acceso</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Alonso Artavia - Visitante</h6>
                                <p class="card-text">Alonso Artavia ha solicitado acceso como colaborador, para apoyar en el mantenimiento del sitio web</p>
                                <form method="POST" action="{{route('actualizar_acceso', $value)}}">
                                    @csrf
                                    <select class="form-select" name="type" aria-label="Default select example" required>
                                        <option value="" selected>Seleccionar rango</option>
                                        <option value="admin">Administrador</option>
                                        <option value="collaborator">Colaborador</option>
                                        <option value="delete">Eliminar usuario</option>
                                    </select>
                                    <button type="submit" class="btn btn-success mt-3 w-100">Actualizar accesos</button>
                                </form>
                            </div>
                        </div>

                    @endforeach

                @else
                    <p class="mt-4 text-center">Sin solicitudes de accesos</p>
                @endif

            </div>
        </div>
        <div class="col-8 bg-white p-4 rounded">
                @include('admin.admins.home-components.home_update', ['form_data' => 'hola'])
        </div>
    </div>
</div>
