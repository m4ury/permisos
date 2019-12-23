@extends('layouts.app')
@section('nav')
@stop
@section('content')
<?php

use Freshwork\ChileanBundle\Rut; ?>
<div class="container">
    <div class="row">
        <div class="col-sm-3 clearfix text-center">
            <img style="height: 100px; width: 100px" src="{{ asset('img/logo.png') }}" alt="logo">
            <h6 class="font-weight-bold">Hospital De Licanten</h6>
            <h6 class="font-weight-bold">Oficina de Recursos Humanos</h6>
        </div>
        <div class="col text-center py-3">
            <h5 class="font-weight-bold">ORDEN DE VIATICO Nº {{ $viatico->id }}</h5>
        </div>
    </div>
    <div class="row">
        <div class="col pt-3">
            <table class="table table-bordered">
                <tr class="py-0">
                    <td rowspan="2">SECCION I</td>
                    <td><b>{{$viatico->permiso->user->nombreCompleto(Auth::id())}}</b></td>
                    <td><b>{{ $viatico->permiso->user->contrato }}</b></td>
                    <td><b>{{ Rut::parse($viatico->permiso->user->rut)->format(Rut::FORMAT_COMPLETE) }}</b></td>
                </tr>
                <tr>
                    <td>APELLIDOS Y NOMBRES</td>
                    <td>CALIDAD</td>
                    <td>RUN Nº</td>
                </tr>
                <tr>
                    <td>SECCION II</td>
                    <td>CARGO: <b>{{ $viatico->permiso->user->cargo->nombre }}</b></td>
                    <td colspan="2">GRADO: <b>{{ $viatico->permiso->grado ?? '--' }}</b></td>
                </tr>
                <tr>
                    <td>SECCION III</td>
                    <td>ESTABLECIMIENTO: <b>{{ Config::get('app.name') }}</b></td>
                    <td colspan="2">UNIDAD O SERVICIO: <b>{{ $viatico->permiso->user->unidad->nombre }}</b></<b>
                </tr>
                <tr>
                    <td rowspan="2">SECCION IV</td>
                    <td>LUGAR DEL COMETIDO</td>
                    <td>DIAS</td>
                    <td>MOTIVO Nº</td>
                </tr>
                <tr>
                    <td><b>{{ $viatico->permiso->lugar}}, {{ $viatico->permiso->comuna }}</b></td>
                    <td><b>{{ $diasCometido }}</b></td>
                    <td><b>{{ $viatico->permiso->descripcion }}</b></td>

                </tr>
                <!-- <tr>
                    <th>CALIDAD FUNCIONARIA: </th>
                    <td><u>{{ $viatico->permiso->user->contrato }}</u></td>
                    </tr>
                    <tr>
                        <th>RUT.: </th>
                        <td><b>{{ Rut::parse($viatico->permiso->user->rut)->format(Rut::FORMAT_COMPLETE) }}</b></td>
                        <th>CARGO: </th>
                        <td><u>{{ $viatico->permiso->user->cargo->nombre }}</u></td>
                    </tr>
                    <tr>
                        <th>GRADO: </th>
                        <td><u>{{ $viatico->permiso->grado ?? '--' }}</u></td>
                        <th>SERVICIO/UNIDAD: </th>
                        <td><u>{{ $viatico->permiso->user->unidad->nombre }}</u></td>
                    </tr>
                    <tr>
                        <th>LUGAR DEL COMETIDO.: </th>
                        <td><u>{{ $viatico->permiso->lugar.', '.$viatico->permiso->comuna }}</u></td>
                        <th>FECHA COMETIDO: </th>
                        <td><u>{{ Carbon\Carbon::parse($viatico->permiso->dia_inicio)->format("d") }} de {{ Carbon\Carbon::parse($viatico->permiso->dia_inicio)->format("M") }} del {{ Carbon\Carbon::parse($viatico->permiso->dia_inicio)->format("Y") }}</u></td>
                    </tr>
                    <tr>
                        <th>MOTIVO DEL COMETIDO: </th>
                        <td><u>{{ $viatico->permiso->descripcion }}</u></td>
                    </tr>
                    <tr>
                        <th>HORA SALIDA: </th>
                        <td><u>{{ Carbon\Carbon::parse($viatico->permiso->hora_inicio)->format("H:i") }}</u></td>
                        <th>HORA LLEGADA: </th>
                        <td><u>{{ Carbon\Carbon::parse($viatico->permiso->hora_fin)->format("H:i") }}</u></td>
                    </tr>
                    @if ($viatico->pasajes)
                    <span class="badge badge-pill badge-success" style="border-radius: 6px">CON PASAJES</span>
                    @endif -->
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
    html {
        font-size: x-small;
    }

    body {
        background: #ffffff;
    }
</style>
@stop