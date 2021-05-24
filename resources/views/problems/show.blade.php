{{--@extends('layouts.app')
@section('nav')
@stop
@section('content')--}}
<?php use Freshwork\ChileanBundle\Rut; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>pdf</title>
    <link href="{{ public_path('css/pdf.css') }}" rel="stylesheet">
</head>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 clearfix text-center">
                <img style="height: 100px; width: 100px" src="{{ asset('img/logo.png') }}" alt="logo">
                <h6 class="font-weight-bold">Hospital De Licanten</h6>
                <h6 class="font-weight-bold">Oficina de Recursos Humanos</h6>
            </div>
            <div class="col text-center py-3">
                <h5 class="font-weight-bold">JUSTIFICACION PROBLEMA CONTROL BIOMETRICO Nº {{ $problem->id }}</h5>
            </div>
        </div>
        <div class="row">
            <p>
                Mediante el presente formulario el(la) funcionario(a) debe cnsignar las razones que fundamentan la ausencia de marcado en la fecha determinada.
            </p>
        </div>
        <div class="row">
            <table class="dark">
                <thead>
                    <tr>
                        <th>
                            Nombre funcionario(a)
                        </th>
                        <th>
                            C. Identidad
                        </th>
                        <th>
                            Cargo
                        </th>
                        <th>
                            Unidad
                        </th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td disabled="">
                            {{ $problems->user->nombreCompleto() }}
                    </td>
                    <td>
                        @if($problems->entrada == 1)
                        {{ $problems->salida }}
                            <strong><i class="fas fa-check mr-1"></i>Compensado</strong>
                            @endif
                    </td>
                    <td>
                        @if($problems->salida == 1)
                            {{ $problems->salida }}
                            <strong><i class="fas fa-check mr-1"></i>Compensado</strong>
                        @endif
                    </td>
                    <td>
                        {{ $problems->comentario_problema }}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="row">
            <div class="col">
                <p class="text-center"><strong>LICANTEN</strong>, a {{ Carbon\Carbon::parse($permisos->dia_inicio)->format('d'). " de " .ucfirst(Carbon\Carbon::create($permisos->dia_inicio)->locale("es")->monthName). " del año " .Carbon\Carbon::parse($permisos->dia_inicio)->format("Y") }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p>La Dirección del Hospital de Licantén autoriza a don(ña) <u class="text-uppercase">{{ $permisos->user->nombreCompleto() }}</u>, C. Identidad Nº <u>{{ Rut::parse($permisos->user->rut)->format(Rut::FORMAT_COMPLETE) }}</u>, quien ostenta el cargo de <u class="text-uppercase">{{ $permisos->user->cargo->nombre }}</u>, </p>
                <p>para ausentarse de las dependencias del Servicio desde las <u>{{ Carbon\Carbon::parse($permisos->hora_inicio)->format("H:i") }}</u> hasta las <u>{{ Carbon\Carbon::parse($permisos->hora_fin)->format("H:i") }}</u> horas, el dia <u>{{ $rango }}</u>, con el objeto de realizar
                    <p>el siguiente cometido: <u class="text-uppercase">{{ $permisos->descripcion }}</u></p>
                <p>en (lugar) <u class="text-uppercase">{{ $permisos->lugar.", ".$permisos->comuna }}</u></p>
                <hr>
                <div class="row">
                    <div class="col">
                        <p>
                            Se moviliza en <u class="text-uppercase">{{ $permisos->movilizacion }}</u>
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
        html{
            font-size: small;
        }
        body{
            background: #ffffff;
        }
    </style>
