{{--@extends('layouts.app')
@section('nav')
@stop
@section('content')--}}
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
        <h5 class="font-weight-bold p-3">ASISTENTES: </h5>
        <div class="row m-3">
            <div class="border border-grey rounded">
                <ul class="mt-3">
                    @foreach($reunion->users as $user)
                        <li class="text-uppercase">{{ $user->name }} {{ $user->apellido_paterno }} {{ $user->apellido_materno }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <h5 class="font-weight-bold p-3">ACTA REUNIÓN: </h5>
        <div class="row m-3">
            <div class="text-wrap border border-primary rounded p-3">{!! $reunion->cuerpo_reunion !!}</div>
        </div>
        <h5 class="font-weight-bold p-3">OBSERVACIONES: </h5>
        <div class="row m-3">
            <p class="text-wrap border border-primary rounded p-3">{{ $reunion->observaciones_reunion ?? 'Sin Observaciones' }}</p>
        </div>
    <style>

        html {
            font-size: x-small;
        }

        body {
            background: #ffffff;
        }

        border:solid 2px black;
    </style>
