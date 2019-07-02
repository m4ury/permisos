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
                <h5 class="card-title">Estimado Sr. Hector Quiero Palacios</h5>
                <p class="card-text">Envio solicitud Salida Especial numero: {{ $salida->id }} del dia {{ Carbon\Carbon::parse($salida->dia_salida)->format("d-m-Y") }}, del funcionario(a) {{ ucfirst($salida->user->name).' '.ucfirst($salida->user->apellido_paterno).' '.ucfirst($salida->user->apellido_materno) }}</p>
                <p>desde las {{ Carbon\Carbon::parse($salida->hora_salida)->format("H:i") }} hasta las {{ Carbon\Carbon::parse($salida->hora_llegada)->format("H:i") }}</p>
                <p>El detalle completo de esta solicitud la puede ver en el módulo de permisos internos del Hospital</p>
                <a class="btn btn-outline-primary" href="{{ url('salidas/'.$salida->id) }}" target="_blank">Ver Solicitud</a>
            </div>
            <div class="card-footer text-muted">
                <p>Atte.</p>
                <p>Departamento de Recursos Humanos</p>
                <p>Hospital de Licantén</p>
            </div>
        </div>
    </div>
@stop