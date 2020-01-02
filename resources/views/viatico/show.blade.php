@extends('layouts.app')
@section('nav')
@stop
@section('content')
<?php
use Freshwork\ChileanBundle\Rut; ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 clearfix text-center">
            <img style="height: 100px; width: 100px" src="{{ asset('img/logo.png') }}" alt="logo">
            <h6 class="font-weight-bold">{{ Config::get('app.name') }}</h6>
            <h6 class="font-weight-bold">Oficina de Recursos Humanos</h6>
        </div>
        <div class="col text-center py-3">
            <h5 class="font-weight-bold">ORDEN DE VIATICO Nº {{ $viatico->id }}</h5>
        </div>
    </div>
    <div class="row">
        <div class="col pt-2">
            <table class="table table-bordered">
                <tr>
                    <td rowspan="2">SECCION I</td>
                    <td>APELLIDOS Y NOMBRES</td>
                    <td>CALIDAD</td>
                    <td>RUN Nº</td>
                </tr>
                <tr class="py-0">
                    <td><b>{{$viatico->permiso->user->nombreCompleto(Auth::id())}}</b></td>
                    <td><b>{{ $viatico->permiso->user->contrato }}</b></td>
                    <td><b>{{ Rut::parse($viatico->permiso->user->rut)->format(Rut::FORMAT_COMPLETE) }}</b></td>
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
                <tr>
                    <td>SECCION V</td>
                    <td colspan="2">PERNOCTA FUERA DE RESIDENCIA</td>
                    @if ($viatico->pernoctacion)
                    <td><span class="badge badge-pill badge-success" style="border-radius: 6px">Pernoctación: SI</span></td>
                        @else
                    <td><span class="badge badge-pill badge-danger" style="border-radius: 6px">Pernoctación: NO</span></td>
                    @endif
                </tr>
                <tr>
                    <td>SECCION VI</td>
                    <td>DERECHO A PASAJES: </td>
                    <td colspan="2"><b>{{ $viatico->permiso->movilizacion }}</b></td>
                </tr>
                <tr>
                    <td rowspan="2">SECCION VII</td>
                    <td>DETALLE DE PASAJES: </td>
                    <td>DESDE: </td>
                    <td>HASTA: </td>
                </tr>
                <tr class="py-0">
                    <td class="align-text-right">TOTAL DIAS DEL COMETIDO FUNCIONAL: <b>{{$diasCometido}}</b></td>
                    <td><b>{{ Carbon\Carbon::parse($viatico->permiso->dia_inicio)->format("d-m-Y") }}</b></td>
                    <td><b>{{ Carbon\Carbon::parse($viatico->permiso->dia_fin)->format("d-m-Y") }}</b></td>
                </tr>
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