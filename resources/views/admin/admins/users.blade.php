@extends('layouts.app')

@section('content')


    <div class="mdc-layout-grid">
        <div class="mdc-layout-grid__inner">
            <div class="mdc-layout-grid__cell--span-12">
                <div class="mdc-card" style="max-width: 1346px; margin: auto;">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 mt-4">

                                @if(session('save'))

                                    <div class="alert alert-success  fade show d-flex justify-content-between" role="alert">
                                        <p class="pe-4 m-0">La contraseña se actualizo con exíto</p>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>

                                @endif

                                    @if(session('actualizado'))

                                        <div class="alert alert-success  fade show d-flex justify-content-between" role="alert">
                                            <p class="pe-4 m-0">Usuario actualizado con exíto</p>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>

                                    @endif

                                    @if(session('eliminnado'))

                                        <div class="alert alert-success  fade show d-flex justify-content-between" role="alert">
                                            <p class="pe-4 m-0">Usuario eliminado con exíto</p>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>

                                    @endif





                                <div class=" p-0">
                                    @if(auth()->user()->type == 'admin' || auth()->user()->type == 'super-admin')
                                            <h3 >Usuarios</h3>
                                    @endif

                                    <p class="mt-3 font-weight-bold">Cambiar contraseña</p>

                                    <form method="POST" action="{{route('new_password', auth()->user()->id)}}">
                                        @csrf
                                        <div class=" mb-3">
                                            <label class="mb-2" for="password">{{ __('Contraseña') }}</label>

                                            <div class="">
                                                <input id="password" placeholder="**********" type="password" class="form-control w-100 @error('password') is-invalid @enderror" name="password" required>

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class=" mb-3">
                                            <label class="mb-2" for="password-confirm" >{{ __('Confirmar Contraseña') }}</label>

                                            <div class="">
                                                <input placeholder="**********" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                            </div>
                                        </div>
                                        <button class=" mt-3 mdc-button mdc-button--unelevated filled-button--success mdc-ripple-upgraded p-3">Actualizar contraseña</button>
                                    </form>
                                    @if(auth()->user()->type == 'admin' || auth()->user()->type == 'super-admin')
                                        <div class="table-responsive">

                                            <div class="header_table">
                                                <div><p class="font-weight-bold">Nombre de usuario</p></div>
                                                <div><p class="font-weight-bold">Correo</p></div>
                                                <div><p class="font-weight-bold">Actualización</p></div>
                                                <div><p class="font-weight-bold">Permisos</p></div>
                                                <div><p class="font-weight-bold">Actualizar</p></div>
                                                <div><p class="font-weight-bold">Eliminar</p></div>
                                            </div>

                                            @if(count($data) > 1)
                                                @foreach($data as $value)

                                                    @if($value->type != 'super-admin' && auth()->user()->id != $value->id)

                                                        <form class="content_header" action="{{route('update_user', $value->id)}}" method="POST">
                                                            @csrf
                                                            <div>
                                                                <p style="overflow: auto">
                                                                    {{$value->name}}
                                                                </p>
                                                            </div>
                                                            <div>
                                                                <p style="overflow: auto">
                                                                    {{$value->email}}
                                                                </p>
                                                            </div>
                                                            <div>
                                                                <p style="overflow: auto">
                                                                    {{$value->updated_at->diffForHumans()}}
                                                                </p>
                                                            </div>
                                                            <div>
                                                                <select name="select_value">
                                                                    <option value="visit" @if($value->type == 'visit') selected @endif>
                                                                        Visitante
                                                                    </option>
                                                                    <option value="admin" @if($value->type == 'admin') selected @endif>
                                                                        Administrador
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <div>
                                                                <button class="mdc-button mdc-button--unelevated filled-button--success mdc-ripple-upgraded p-3">Actualizar</button>
                                                            </div>
                                                            <div>
                                                                <!-- Button trigger modal -->
                                                                <a type="button" class="mdc-button mdc-button--unelevated filled-button--secondary mdc-ripple-upgraded p-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$value->id}}">
                                                                    Eliminar
                                                                </a>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="staticBackdrop{{$value->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                    <div class="modal-dialog modal-dialog-centered">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">¿Seguro que desea eliminar a "{{$value->name}}"?</h1>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body text-right d-flex">
                                                                                Al aceptar y eliminar este usuario ya no podrá recuperarlo.
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button class="mdc-button mdc-button--unelevated filled-button--light mdc-ripple-upgraded p-3" data-bs-dismiss="modal" type="button" >
                                                                                    Cancelar
                                                                                </button>
                                                                                <a href="{{route('delete_user', $value->id)}}" class="mdc-button mdc-button--unelevated filled-button--secondary mdc-ripple-upgraded p-3">
                                                                                    Aceptar y Eliminar
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    @endif
                                                @endforeach

                                            @else
                                                <div style="text-align: center">
                                                    No tenemos usuarios que mostrar
                                                </div>
                                            @endif
                                        </div>
                                    @endif
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <style>
        .header_table,
        .content_header{
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            grid-gap: 20px;
            padding: 20px 0px;
        }

        .content_header{
            border-bottom: 1px solid #eeeeee;
        }

        .table-responsive{
            overflow: hidden;
        }

        select{
            width: 100%;
            border: none;
            padding: 9px;
            cursor: pointer;
        }

    </style>

@endsection

