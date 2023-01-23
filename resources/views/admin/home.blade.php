@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if(auth()->user()->type == 'admin')

            @include('admin.admins.home')

        @elseif(auth()->user()->type == 'collaborators')

            <h1>Collaborador</h1>

        @else

            @include('admin.visits.home')

        @endif
    </div>
</div>
@endsection
