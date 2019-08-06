@extends('layouts.app')
    @section('nav')
        @stop
@section('content')
    <div class="container">
        <div class="row">
        <div class="card text-center">
            <div class="card-header">
                Solicitud de Salida Especial
            </div>
            <div class="card-body">
                <h5 class="card-title text-uppercase">Estimado(a) {{ $salida->user->nombreCompleto($salida->user->id) }}</h5>
                <p class="card-text">Su solicitud de Salida Especial numero: {{ $salida->id }} del dia {{ Carbon\Carbon::parse($salida->dia_salida)->format("d-m-Y") }}, se ha realizado con Exito!!</p>
                <p>El detalle completo de esta solicitud la puede ver en el módulo de permisos internos del Hospital</p>
                <a class="btn btn-success" href="{{ url('salidas/'.$salida->id) }}" target="_blank">Ver Solicitud</a>
            </div>
            <div class="card-footer text-muted">
                <p>Atte.</p>
                <p>Departamento de Recursos Humanos</p>
                <p>Hospital de Licantén</p>
            </div>
        </div>
        </div>
    </div>
@stop