@extends('layouts.app')
@section('nav')
    @stop
@section('content')

    <div class="container-fluid" xmlns:float="http://www.w3.org/1999/xhtml" xmlns:bottom="http://www.w3.org/1999/xhtml">
        <div class="row">
            <div class="col-sm-4 clearfix text-center">
                <img style="height: 150px; width: 150px" src="{{ asset('img/logo.png') }}" alt="logo">

            </div>
            <div class="col-sm-8 float-right">
                <h5>PERMISO DE SALIDA ESPECIAL Nº {{ $salida->id }}</h5>
            </div>
        </div>
        <div class="row">
        <div class="col">

<table class="table-striped py-5">
                <thead>
                    <tr><th>FECHA SOLICITUD: </th> <td>{{ Carbon\Carbon::parse($salida->created_at)->format("d-m-Y") }}</td><th>SERVICIO: </th> <td>{{ $salida->user->unidad->nombre }}</td></tr>
                    <tr><th>NOMBRES Y APELLIDOS: </th><td>{{  strtoupper($salida->user->name) }} {{ strtoupper($salida->user->apellido_paterno) }} {{ strtoupper($salida->user->apellido_materno) }}</td></tr>
                    <tr><th>FECHA DE PERMISO: </th><td>{{ Carbon\Carbon::parse($salida->dia_salida)->format("d-m-Y") }}</td></tr>
                    <tr><th>MOTIVO DE SALIDA: </th><td>{{ strtoupper($salida->descripcion) }}</td></tr>
                    <tr><th>HORA DE SALIDA: </th><td>{{ Carbon\Carbon::parse($salida->hora_salida)->format("H:i") }}</td><th>HORA LLEGADA: </th><td>{{ Carbon\Carbon::parse($salida->hora_llegada)->format("H:i") }}</td></tr>
                </thead>
            </table>
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