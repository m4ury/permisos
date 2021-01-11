@extends('layouts.app')
    @section('nav')
        @stop
@section('content')
    <div class="container">
        <div class="row">
        <div class="card text-center">
            <div class="card-header">
                Invitacion a Reunion
            </div>
            <div class="card-body">
                <h5 class="card-title text-uppercase">Estimado(a) {{ $reunion->users->nombreCompleto() }}</h5>
                <p class="card-text">Ud ha sido invitado a reunion {{ $reunion->titulo_reunion }} el dia {{ Carbon\Carbon::parse($reunion->dia_reunion)->format("d-m-Y") }}, a las {{ $reunion->inicio_reunion }} </p>
                <p>Te esperamos en {{ $reunion->observaciones_reunion }}</p>
            </div>
            <div class="card-footer text-muted">
                <p>Atte.</p>
                <p>Email generado automaticamente, favor, No responder</p>
                <p>Hospital de Licantén</p>
            </div>
        </div>
        </div>
    </div>
@stop