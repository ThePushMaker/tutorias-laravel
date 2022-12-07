@extends('layouts.profesores.dashboard')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Solicitudes de tutorias</h1>
    </div>


        <div id=app></div>

        @vite('resources/js/solicitudes-list.js')
@endsection