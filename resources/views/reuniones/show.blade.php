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
            <div class="col text-center">
                <h4 class="font-weight-bold">REUNION Nº {{ $reunion->id }}</h4>
                <h5 class="text-uppercase font-weight-bold">{{ $reunion->titulo_reunion }}
                    - {{$reunion->categoria ? $reunion->categoria->nombre_categoria : 'Sin Categoria Asignada' }}</h5>

            </div>
            <div class="border border-dark float-right rounded p-3">
                <h6 class="font-weight-bold">FECHA / HORA</h6>
                <ul class="list-unstyled">
                    <li>Dia: {{ Carbon\Carbon::parse($reunion->dia_reunion)->format("d-m-Y") }}</li>
                    <li>Inicio: {{ Carbon\Carbon::parse($reunion->inicio_reunion)->format("H:i") }}</li>
                    <li>Fin: {{  Carbon\Carbon::parse($reunion->fin_reunion)->format("H:i") }}</li>
                </ul>
            </div>
        </div>

        <h5 class="font-weight-bold p-3">Asistentes: </h5>

        <div class="row m-3">
            <div class="border border-grey rounded">
                <ul class="mt-3">
                    <li>Juanito Perez</li>
                    <li>Panchito Lucho</li>
                    <li>Luchito de las Peras</li>
                </ul>
            </div>
        </div>

        <h5 class="font-weight-bold p-3">Cuerpo Reunión: </h5>

        <div class="row m-3">
            <p class="text-wrap">{{ $reunion->cuerpo_reunion }}</p>
        </div>

        <h5 class="font-weight-bold p-3">Observaciones: </h5>

        <div class="row m-3">
            <p class="text-wrap">{{ $reunion->observaciones_reunion ?? 'Sin Observaciones' }}</p>
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