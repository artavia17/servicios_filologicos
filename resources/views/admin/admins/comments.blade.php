@extends('layouts.app')

@section('content')

@if(auth()->user()->type == 'admin' || auth()->user()->type == 'super-admin')

    <div class="mdc-layout-grid">
        <div class="mdc-layout-grid__inner">
            <div class="mdc-layout-grid__cell--span-12">
                <div class="mdc-card" style="max-width: 1346px; margin: auto;">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 mt-4">

                                @if(session('save'))

                                    <div class="alert alert-success  fade show d-flex justify-content-between" role="alert">
                                        <p class="pe-4 m-0">{{ Session::get('save') }}</p>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>

                                @endif

                                <div class=" p-0">
                                    <h3 >Comentarios</h3>
                                    <div class="table-responsive">

                                        <div class="header_table">
                                            <div><p class="font-weight-bold">Titular</p></div>
                                            <div><p class="font-weight-bold">Servicio</p></div>
                                            <div><p class="font-weight-bold">Correo</p></div>
                                            <div><p class="font-weight-bold">Comentario</p></div>
                                            <div><p class="font-weight-bold">Actualización</p></div>
                                            <div><p class="font-weight-bold">Estado</p></div>
                                            <div><p class="font-weight-bold">Actualizar</p></div>
                                            <div><p class="font-weight-bold">Eliminar</p></div>
                                        </div>

                                        @if(count($data))
                                            @foreach($data as $value)

                                                <form class="content_header" action="{{route('comments_update', $value->id)}}" method="POST">
                                                    @csrf
                                                    <div>
                                                        <p>
                                                            {{$value->nombre}}
                                                        </p>
                                                    </div>
                                                    <div>
                                                        <p>
                                                                @inject('servicios', 'App\Models\Servicios')

                                                            @if($servicios)

                                                                @php

                                                                    $title_service = $servicios->where('id', $value->id_servicio)->first();

                                                                @endphp

                                                                @if($title_service)
                                                                    {{ $title_service->title }}
                                                                @endif
                                                                

                                                               
                                                            @endif
                                                        </p>
                                                    </div>
                                                    <div>
                                                        <p>
                                                            {{$value->email}}
                                                        </p>
                                                    </div>
                                                    <div>
                                                        <textarea name="contenido" required style="width: 100%; height: 140px; border: none">{{$value->description}}</textarea>
                                                    </div>
                                                    <div>
                                                        <p>
                                                            {{$value->updated_at->diffForHumans()}}
                                                        </p>
                                                    </div>
                                                    <div>
                                                        <select name="select_value">
                                                            <option value="verify" @if($value->public == 'verify') selected @endif>
                                                                Sin verificar
                                                            </option>
                                                            <option value="public" @if($value->public == 'public') selected @endif>
                                                                @if($value->public == 'public')
                                                                    Publicado
                                                                @else
                                                                    Publicar
                                                                @endif
                                                            </option>
                                                            <option value="unpublic" @if($value->public == 'unpublic') selected @endif>
                                                                @if($value->public == 'unpublic')
                                                                    Rechazado
                                                                @else
                                                                    Rechazar
                                                                @endif
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
                                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">¿Seguro que desea eliminar el comentario de "{{$value->nombre}}"?</h1>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body text-right d-flex">
                                                                        Al aceptar y eliminar este comentario ya no podrá recuperarlo.
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button class="mdc-button mdc-button--unelevated filled-button--light mdc-ripple-upgraded p-3" data-bs-dismiss="modal" type="button" >
                                                                            Cancelar
                                                                        </button>
                                                                        <a href="{{route('comments_delete', $value->id)}}" class="mdc-button mdc-button--unelevated filled-button--secondary mdc-ripple-upgraded p-3">
                                                                            Aceptar y Eliminar
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                            @endforeach

                                        @else
                                            <div style="text-align: center">
                                                No tenemos servicios que mostrar
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
    </div>

    <style>
        .header_table,
        .content_header{
            display: grid;
            grid-template-columns: 10.5% 10.5% 10.5% 25% 10.5% 10.5% 10.5% 10.5%;
            grid-gap: 5px;
            padding: 20px 0px;
        }

        .content_header{
            border-bottom: 1px solid #eeeeee;
        }

        p{
            overflow: auto;
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
@else

    @include('admin.visits.home')

    <style>
        .col-md-8 {
            margin: auto;
        }

        .card {
            max-width: 800px;
            margin: auto;
        }
    </style>

@endif
@endsection
