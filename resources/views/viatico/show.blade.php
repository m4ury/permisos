@extends('layouts.app')
@section('nav')
@stop
@section('content')
    <?php use Freshwork\ChileanBundle\Rut; ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4 clearfix text-center">
                <img style="height: 120px; width: 120px" src="{{ asset('img/logo.png') }}" alt="logo">
                <p class="font-weight-bold">Oficina de Recursos Humanos</p>
            </div>
        </div>
        <div class="row">
                <div class="col text-center pb-3">
                    <h6 class="font-weight-bold">ORDEN DE COMETIDO FUNCIONARIO Nº {{ $permisos->id }}</h6>
                </div>
        </div>
        <div class="row">
            <div class="col">
                <p class="text-center"><strong>LICANTEN</strong>, a {{ Carbon\Carbon::parse($permisos->created_at)->format("d") }} de {{ Carbon\Carbon::parse($permisos->created_at)->format("M") }} del {{ Carbon\Carbon::parse($permisos->created_at)->format("Y") }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p>La Dirección del Hospital de Licantén autoriza a don(ña) <u>{{ strtoupper($permisos->user->name).' '.strtoupper($permisos->user->apellido_paterno).' '.strtoupper($permisos->user->apellido_materno) }}</u>, C. Identidad Nº <u>{{ Rut::parse($permisos->user->rut)->format(Rut::FORMAT_COMPLETE) }}</u>, quien ostenta el cargo de <u>{{ strtoupper($permisos->user->cargo->nombre) }}</u>, </p>
                <p>para ausentarse de las dependencias del Servicio desde las <u>{{ Carbon\Carbon::parse($permisos->hora_inicio)->format("H:i") }}</u> hasta las <u>{{ Carbon\Carbon::parse($permisos->hora_fin)->format("H:i") }}</u> horas del dia <u>{{ Carbon\Carbon::parse($permisos->dia_inicio)->format("d") }} de {{ Carbon\Carbon::parse($permisos->dia_inicio)->format("M") }} del {{ Carbon\Carbon::parse($permisos->dia_inicio)->format("Y") }}</u>, con el objeto de realizar
                    <p>el siguiente cometido: <u>{{ strtoupper($permisos->descripcion) }}</u></p>
                <p>en (lugar) <u>{{ strtoupper($permisos->lugar.", ".$permisos->comuna) }}</u></p>
                <hr>
                <div class="row">
                    <div class="col">
                        <p>
                            Se moviliza en <u>{{ strtoupper($permisos->movilizacion) }}</u>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        @if ($permisos->incluye_viatico == 1)
                            <span class="badge badge-pill badge-success" style="border-radius: 6px">Incluye Viatico</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
            <div class="row">
                <div class="col">
                    <span class="float-left font-weight-bold fixed-bottom">Firma Funcionario(a)</span>
                </div>
                <div class="col">
                    <span class="float-right font-weight-bold fixed-bottom">Firma y Timbre Dirección</span>
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <div class="col">
                        <span class="font-weight-bold fixed-bottom">VºBº Jefe Directo</span>
                    </div>
                </div>
            </div>
        </div>
    <style>
        body{
            background: #ffffff;
        }
    </style>
@stop