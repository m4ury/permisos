@extends('layouts.app')
@section('nav')
    @stop
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <img src="" alt="">
            </div>
        </div>
        <div class="row">
            <div class="py-5 text-center">
                <h2 class="title">PERMISO DE SALIDA ESPECIAL Nº.: {{ $salida->id }}</h2>
            </div>
        </div>
        <div class="row">
        <div class="col">
            <table class="table-striped">
                <thead>
                    <tr><th>FECHA SOLICITUD: </th> <td>{{ Carbon\Carbon::parse($salida->created_at)->format("d-m-Y") }}</td></tr>
                    <tr><th>NOMBRES Y APELLIDOS: </th></tr>
                    <tr><th>FECHA DE PERMISO: </th><td>{{ $salida->dia_salida }}</td></tr>
                    <tr><th>MOTIVO DE SALIDA: </th><td>{{ strtoupper($salida->descripcion) }}</td></tr>
                    <tr><th>HORA DE SALIDA: </th><td>{{ $salida->hora_salida }}</td><th>HORA LLEGADA: </th><td>{{ $salida->hora_llegada }}</td></tr>
                </thead>
            </table>
            </div>
        </div>

    </div>

    @stop