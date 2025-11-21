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

            <p>Sin permiso para realizar cambios</p>
        </div>
    </div>
</div>

