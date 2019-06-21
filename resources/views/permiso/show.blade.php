@extends('layouts.app')
@section('nav')
@stop
@section('content')
    <?php use Freshwork\ChileanBundle\Rut; ?>
    <div class="container-fluid py-4" xmlns:float="http://www.w3.org/1999/xhtml" xmlns:bottom="http://www.w3.org/1999/xhtml">
        <div class="row">
            <div class="col-sm-4 clearfix">
                <img style="height: 150px; width: 150px" src="{{ asset('img/logo.png') }}" alt="logo">
            </div>
            <div class="col-sm-8 float-right">
                <h2>ORDEN DE COMETIDO FUNCIONARIO Nº {{ $permisos->id }}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-11">
                <p class="text-right"><strong>LICANTEN</strong>, a {{ Carbon\Carbon::parse($permisos->created_at)->format("d") }} de {{ Carbon\Carbon::parse($permisos->created_at)->format("M") }} del {{ Carbon\Carbon::parse($permisos->created_at)->format("Y") }}</p>
            </div>
        </div>
        <div class="row py-2">
            <div class="col-12">
                <p>La Dirección del Hospital de Licantén autoriza a don(ña) {{ ucfirst($permisos->user->name) }} {{ ucfirst($permisos->user->apellido_paterno) }} {{ ucfirst($permisos->user->apellido_materno) }}, C. Identidad Nº {{ Rut::parse($permisos->user->rut)->format(Rut::FORMAT_COMPLETE) }}, quien ostenta el cargo de {{ $permisos->user->cargo->nombre }}, </p>
                <p>para ausentarse de las dependencias del Servicio desde las {{ Carbon\Carbon::parse($permisos->hora_inicio)->format("H:i") }} hasta las {{ Carbon\Carbon::parse($permisos->hora_fin)->format("H:i") }} horas del dia {{ Carbon\Carbon::parse($permisos->dia_inicio)->format("d") }} de {{ Carbon\Carbon::parse($permisos->dia_inicio)->format("M") }} del {{ Carbon\Carbon::parse($permisos->dia_inicio)->format("Y") }}, con el objeto de realizar
                    <p>el siguiente cometido: {{ $permisos->descripcion }}</p>
                <p>en (lugar) {{ $permisos->lugar }}</p>
                <hr>
                <div class="row">
                    <div class="col">
                        <p>
                            Se moviliza en {{ $permisos->movilizacion }}
                        </p>
                    </div>
                </div>
                <div class="row py-1">
                    <div class="col">
                        @if ($permisos->viatico == 1)
                            <span class="py-2 badge badge-pill badge-success" style="border-radius: 6px">Incluye Viatico</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="fixed-bottom">
            <span class="float-left font-weight-bold">Firma Funcionario(a)</span>
            <span class="float-right font-weight-bold">Firma y Timbre Dirección</span>
        </div>
        </div>
    <style>
        body{
            background: #ffffff;
        }
    </style>
@stop