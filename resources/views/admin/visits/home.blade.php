<div class="col-md-8">
    <div class="card">
        <div class="card-header">
            <h2 class="m-0">Bienvenid@ {{auth()->user()->name}}</h2>
        </div>

        <div class="card-body">

            @if(session('message'))

                <div class="alert alert-success" role="alert">
                    {{session('message')}}
                </div>

            @endif

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <p>Para acceder a todos los componentes debe solitar acceso al administrador</p>
            <form method="POST" action="{{route('solicitar_acceso')}}">
                @csrf
                <button type="submit" href="{{route('solicitar_acceso')}}" class="btn  btn_orange">Solicitar Acceso</button>
            </form>
        </div>
    </div>
</div>

