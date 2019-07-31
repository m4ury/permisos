<?php $s = new App\Salida; ?>

@extends('layouts.app')
@section('nav')
    @stop
@section('content')

    <div class="container">
        <div class="col-sm-3 clearfix text-center">
            <img style="height: 100px; width: 100px" src="{{ asset('img/logo.png') }}" alt="logo">
            <h6 class="font-weight-bold">Hospital De Licanten</h6>
            <h6 class="font-weight-bold">Oficina de Recursos Humanos</h6>
        </div>
        <div class="row">
            <div class="col-sm-8 float-right py-3">
                <h5><u>PERMISO DE SALIDA ESPECIAL Nº {{ $salida->id }}</u></h5>
            </div>
        </div>
        <div class="row">
            <div class="col pt-5">
                <table class="table-striped py-5">
                    <thead>
                        <tr><th>FECHA SOLICITUD: </th> <td><u>{{ Carbon\Carbon::parse($salida->created_at)->format("d-m-Y") }}</u></td><th>SERVICIO: </th> <td><u>{{ strtoupper($salida->user->unidad->nombre) }}</u></td></tr>
                        <tr><th>NOMBRES Y APELLIDOS: </th><td><u>{{  strtoupper($salida->user->name) }} {{ strtoupper($salida->user->apellido_paterno) }} {{ strtoupper($salida->user->apellido_materno) }}</u></td></tr>
                        <tr><th>FECHA DE PERMISO: </th><td><u>{{ Carbon\Carbon::parse($salida->dia_salida)->format("d-m-Y") }}</u></td></tr>
                        <tr><th>MOTIVO DE SALIDA: </th><td><u>{{ strtoupper($salida->descripcion) }}</u></td></tr>
                        <tr><th>HORA DE SALIDA: </th><td><u>{{ Carbon\Carbon::parse($salida->hora_salida)->format("H:i") }}</u></td><th>HORA LLEGADA: </th><td><u>{{ Carbon\Carbon::parse($salida->hora_llegada)->format("H:i") }}</u></td></tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <span class="badge badge-pill badge-success rounded">Minutos Ocupados: {{ $s->totalHorasMes(Auth::id()) }} de 120</span>
            </div>
        </div>

        <div class="row">
            <div class="col clearfix fixed-bottom">
                <span class="float-left font-weight-bold">Firma Funcionario(a) Solicitante</span>

                <span class="float-right font-weight-bold">VºBº Jefe Directo</span>
            </div>
        </div>
    </div>

    <style>
        body{
            background: #ffffff;
        }
    </style>

    @stop