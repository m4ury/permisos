{{--@extends('layouts.app')
@section('nav')
@stop
@section('content')--}}
<?php use Freshwork\ChileanBundle\Rut; ?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>pdf</title>
        <link href="{{ public_path('css/pdf.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
            integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <div class="container-fluid">
        <div class="row pb-3">
            <div class="col-sm-3 clearfix text-center">
                <img style="height: 100px; width: 100px" src="{{ asset('img/logo.png') }}" alt="logo">
                <h6 class="font-weight-bold">Hospital De Licanten</h6>
                <h6 class="font-weight-bold">Oficina de Recursos Humanos</h6>
            </div>
        </div>
        <div class="row text-center py-4">
            <h6 class="font-weight-bold">JUSTIFICACION PROBLEMA CONTROL BIOMETRICO Nº {{ $problems->id }}</h6>
        </div>
        <div class="row pt-1">
            <h6 class="font-weight-bold">
                Mediante el presente formulario el(la) funcionario(a) debe consignar las razones que fundamentan la
                ausencia
                de marcado en la fecha determinada.
            </h6>
        </div>
        <div class="row">
            <table class="table table-striped table-bordered table-responsive-sm">
                <thead>
                    <tr>
                        <th>
                            Nombre funcionario(a)
                        </th>
                        <th>
                            C. Identidad
                        </th>
                        <th>
                            Cargo
                        </th>
                        <th>
                            Unidad
                        </th>
                    </tr>
                </thead>
                <tr>
                    <td disabled="">
                        {{ $problems->user->nombreCompleto() }}
                    </td>
                    <td disabled="">
                        {{ Rut::parse($problems->user->rut)->format(Rut::FORMAT_COMPLETE) }}
                    </td>
                    <td disabled="">
                        {{ $problems->user->cargo->nombre }}
                    </td>
                    <td disabled="">
                        {{ $problems->user->unidad->nombre }}
                    </td>
                </tr>
            </table>
        </div>
        <div class="row">
            <h6 class="font-weight-bold pt-2">
                A continuación se indica la jornada en que presentó dificultades en su marcacado.
            </h6>
        </div>
        <div class="row">
            <table class="table table-striped table-bordered table-responsive-sm">
                <thead>
                    <tr>
                        <th>
                            Fecha
                        </th>
                        <th>
                            Entrada
                        </th>
                        <th>
                            Salida
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td nowrap="" class="text-uppercase">
                            {{ Carbon\Carbon::create($problems->fecha_problema)->locale("es")->dayName." ".Carbon\Carbon::parse($problems->fecha_problema)->format('d')." de ".strtoupper(Carbon\Carbon::create($problems->fecha_problema)->locale("es")->monthName)." del año ".Carbon\Carbon::parse($problems->fecha_problema)->format("Y") }}
                        </td>
                        <td disabled="">
                            @if ($problems->entrada == 1)
                            <strong class="text-center"><i class="fas fa-check mr-1"></i></strong>
                            @endif
                        </td>
                        <td disabled="">
                            @if ($problems->salida == 1)
                            <strong class="text-center"><i class="fas fa-check mr-1"></i></strong>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row">
            <h6 class="font-weight-bold">
                Relato breve del episodio.
            </h6>
        </div>

        <div class="row pb-5">
            <div class="border border-dark p-3">
                <p class="text-left">
                    {{ $problems->comentario_problema }}
                </p>
            </div>
        </div>
        <div class="row pt-3">
            <div class="col">
                <hr style="width: 30%;background-color: black;margin-left: 0%;margin-right: 50%;">
                <p class="text-center" style="margin-left: 0%; margin-right: 70%"><strong>Firma Funcionario(a)</strong>
                </p>
            </div>
            <div class="col">
                <hr style="width: 30%;background-color: black;margin-left: 65%;margin-right: 0%;">
                <p class="text-center" style="margin-left: 60%; margin-right: 0%"><strong> Firma Jefe Directo </strong>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <hr style="width: 40%;background-color: black;margin-left: 30%;margin-right: 30%;">
                <span class="font-weight-bold">VºBº Jefatura Recursos Humanos</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col text-center">
            <span class="font-weight-bold fixed-bottom">En Licanten, a
                {{ Carbon\Carbon::parse($problems->created_at)->format('d').' de '.\Carbon\Carbon::parse($problems->created_at)->monthName.' de '.\Carbon\Carbon::parse($problems->created_at)->format('Y') }}</span>
        </div>
    </div>
    <style>
        html {
            font-size: small;
        }

        body {
            background: #ffffff;
        }
    </style>

</html>
