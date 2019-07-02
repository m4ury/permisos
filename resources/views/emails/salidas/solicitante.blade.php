@extends('layouts.app')
    @section('nav')
        @stop
@section('content')
    <div class="container">
        <div class="card text-center">
            <div class="card-header">
                Solicitud de Salida Especial
            </div>
            <div class="card-body">
                <h5 class="card-title">Estimado(a) {{ ucfirst($salida->user->name).' '.ucfirst($salida->user->apellido_paterno).' '.ucfirst($salida->user->apellido_materno) }}</h5>
                <p class="card-text">Su solicitud de Salida Especial numero: {{ $salida->id }} del dia {{ Carbon\Carbon::parse($salida->dia_salida)->format("d-m-Y") }}, ha sido enviada a Su Director</p>
                <p>El detalle completo de esta solicitud la puede ver en el módulo de permisos internos del Hospital</p>
                <a class="btn-success" href="{{ url('salidas/'.$salida->id) }}" target="_blank">Ver Solicitud</a>
            </div>
            <div class="card-footer text-muted">
                <p>Atte.</p>
                <p>Departamento de Recursos Humanos</p>
                <p>Hospital de Licantén</p>
            </div>
        </div>
    </div>
@stop