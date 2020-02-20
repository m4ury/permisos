@extends('layouts.app')
@section('nav')
@stop
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 clearfix text-center">
                <img style="height: 100px; width: 100px" src="{{ asset('img/logo.png') }}" alt="logo">
                <h6 class="font-weight-bold">{{ Config::get('app.name') }}</h6>
            </div>
            <div class="col text-center">
                <h5 class="font-weight-bold">REUNION Nº {{ $reunion->id }}</h5>
                <div>
                    <h6 class="text-uppercase font-weight-bold">{{ $reunion->titulo_reunion }}</h6>
                    <p class="text-muted font-weight-bold">
                        {{$reunion->categoria ? $reunion->categoria->nombre_categoria : 'Sin Categoria Asignada' }}
                    </p>
                </div>
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
        {{--@php
            $usuario = new \App\User();
        @endphp--}}
        <h5 class="font-weight-bold p-3">Asistentes: </h5>
        <div class="row m-3">
            <div class="border border-grey rounded">
                <ul class="mt-3">
                    @foreach($reunion->users as $user)
                        <li class="text-uppercase">{{ $user->name }} {{ $user->apellido_paterno }} {{ $user->apellido_materno }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <h5 class="font-weight-bold p-3">Cuerpo Reunión: </h5>

        <div class="row m-3">
            <p class="text-wrap">{!! $reunion->cuerpo_reunion !!}</p>
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