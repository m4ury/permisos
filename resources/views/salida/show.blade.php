@extends('layouts.app')
@section('nav')
    @stop
@section('content')

    <div class="container-fluid" xmlns:float="http://www.w3.org/1999/xhtml" xmlns:bottom="http://www.w3.org/1999/xhtml">
        <div class="row">
            <div class="col-2">
                <img src="" alt="">
            </div>
        </div>
        <div class="row">
            <div class="py-5 text-center">
                <h2 class="title">PERMISO DE SALIDA ESPECIAL Nº {{ $salida->id }}</h2>
            </div>
        </div>
        <div class="row">
        <div class="col-12 text">
            <table class="table-striped">
                <thead>
                    <tr><th>FECHA SOLICITUD: </th> <td>{{ Carbon\Carbon::parse($salida->created_at)->format("d-m-Y") }}</td><th>SERVICIO: </th> <td>{{ $unidadUser->nombre }}</td></tr>
                    <tr><th>NOMBRES Y APELLIDOS: </th><td>{{  strtoupper($salidaUser->name) }} {{ strtoupper($salidaUser->apellido_paterno) }} {{ strtoupper($salidaUser->apellido_materno) }}</td></tr>
                    <tr><th>FECHA DE PERMISO: </th><td>{{ Carbon\Carbon::parse($salida->dia_salida)->format("d-m-Y") }}</td></tr>
                    <tr><th>MOTIVO DE SALIDA: </th><td>{{ strtoupper($salida->descripcion) }}</td></tr>
                    <tr><th>HORA DE SALIDA: </th><td>{{ $salida->hora_salida }}</td><th>HORA LLEGADA: </th><td>{{ $salida->hora_llegada }}</td></tr>
                </thead>
            </table>
            </div>
        </div>

        <div class="row">
            <div class="col text-center">
                <hr style="bottom: 0; float: none;">
                <p class="align-text-bottom font-weight-bold">VºBº JEFE DIRECTO</p>
            </div>
        </div>
    </div>

    @stop