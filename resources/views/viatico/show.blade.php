{{-- @extends('layouts.app')
@section('nav')
@stop
@section('content')
--}}
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
                <h5 class="font-weight-bold">SOLICITUD DE VIATICO Nº {{ $viatico->id }}</h5>
            </div>
        </div>
        <div class="row">
            <div class="col pt-3">
                <table>
                    <tr><th>NOMBRES COMPLETO DEL FUNCIONARIO: </th><td><u>{{$viatico->permiso->user->nombreCompleto() }}</u></td></tr>
                    <tr><th>CALIDAD FUNCIONARIA: </th><td><u>{{ $viatico->permiso->user->contrato }}</u></td></tr>
                    <tr><th>RUT.: </th><td><u>{{ Rut::parse($viatico->permiso->user->rut)->format(Rut::FORMAT_COMPLETE) }}</u></td><th>CARGO: </th><td><u>{{ $viatico->permiso->user->cargo->nombre }}</u></td></tr>
                    <tr><th>GRADO: </th><td><u>{{ $viatico->permiso->grado ?? '--' }}</u></td><th>SERVICIO/UNIDAD: </th><td><u>{{ $viatico->permiso->user->unidad->nombre }}</u></td></tr>
                    <tr><th>LUGAR DEL COMETIDO.: </th><td><u>{{ $viatico->permiso->lugar ?? " " }} {{ $viatico->permiso->comuna }}</u></td><th>FECHA COMETIDO: </th><td><u>{{ $rango ?? Carbon\Carbon::parse($viatico->permiso->dia_inicio)->format("d") }} de {{ ucfirst(Carbon\Carbon::create($viatico->permiso->dia_inicio)->locale("es")->monthName) }} del año {{ Carbon\Carbon::parse($viatico->permiso->dia_inicio)->format("Y") }}</u></td></tr>
                    <tr><th>MOTIVO DEL COMETIDO: </th><td><u>{{ $viatico->permiso->descripcion }}</u></td></tr>
                    <tr><th>HORA SALIDA: </th><td><u>{{ Carbon\Carbon::parse($viatico->permiso->hora_inicio)->format("H:i") }}</u></td><th>HORA LLEGADA: </th><td><u>{{ Carbon\Carbon::parse($viatico->permiso->hora_fin)->format("H:i") }}</u></td></tr>
                    @if ($viatico->pasajes>0)
                        <span class="badge badge-pill badge-success" style="border-radius: 6px">CON PASAJES</span>
                    @endif
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <span class="float-left font-weight-bold fixed-bottom">Firma Funcionario(a)</span>
            </div>
            <div class="col">
                <span class="float-right font-weight-bold fixed-bottom">Firma y Timbre Quien Autoriza</span>
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
{{-- @stop --}}
