@extends('layouts.profesores.dashboard')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Home</h1>
    </div>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h2 class="h4">Titulo sección</h2>
            <div class="btn-toolbar mb-2 mb-md-0">
            <button  type="button" class="btn btn-sm btn-outline-primary">
                <span>Nuevo</span>    
            </button>
            </div>
    </div>

        <div id=app></div>

        @include('layouts.tabla')


        @vite('resources/js/app.js')
@endsection