@extends('layouts.app')
@section('nav')
@stop
@section('content')
    <?php use Freshwork\ChileanBundle\Rut; ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <h6 class="font-weight-bold">I. DATOS PERSONALES</h6>
                <table class="table-sm table-striped table-bordered">
                    <tr>
                        <th>Nombres</th>
                        <td colspan="4">{{ $permisos->user->name }}</td>
                    </tr>
                    <tr>
                        <th>Apellidos</th>
                        <td colspan="4">{{ $permisos->user->apellido_paterno.' '.$permisos->user->apellido_materno }}</td>
                    </tr>
                    <tr>
                        <th>R.U.N.</th>
                        <td colspan="2">{{ Rut::parse($permisos->user->rut)->format(Rut::FORMAT_COMPLETE) }}</td>
                        <th>Profesion</th>
                        <td>{{ $permisos->user->profesion->profesion_nombre }}</td>
                    </tr>
                    <tr>
                        <th>Cargo</th>
                        <td colspan="2">{{ $permisos->user->cargo->nombre }}</td>
                        <th>Unidad</th>
                        <td>{{ $permisos->user->unidad->nombre }}</td>
                    </tr>
                    <tr>
                        <th>Calidad Juridica</th>
                        <td colspan="2">{{ $permisos->user->contrato }}</td>
                        <th>Grado</th>
                        <td>{{ $permisos->user->grado }}</td>
                    </tr>
                    <tr>
                        <th>Anexo</th>
                        <td colspan="2">{{ $permisos->user->anexo }}</td>
                        <th>Celular</th>
                        <td>{{ $permisos->user->celular }}</td>
                    </tr>
                    <tr>
                        <th>E-mail</th>
                        <td colspan="4">{{ $permisos->user->email }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h6 class="font-weight-bold">II. ANTECEDENTES ACTIVIDAD</h6>
                <table class="table-sm table-striped table-bordered">
                    <tr>
                        <th>Nombre de la Actividad</th>
                        <td colspan="4">{{ $permisos->descripcion }}</td>
                    </tr>
                    <tr>
                        <th>Organizado por</th>
                        <td colspan="4">{{ $permisos->organizador }}</td>
                    </tr>
                    <tr>
                        <th>Lugar de realización</th>
                        <td colspan="4">{{ $permisos->lugar." ".$permisos->comuna }}</td>
                    </tr>
                    <tr>
                        <th>Fecha de realización</th>
                        <td colspan="4">{{ Carbon\Carbon::parse($permisos->dia_inicio)->format("d-m-Y") }}</td>
                    </tr>
                    <tr>
                        <th>Documento con el cual se informó</th>
                        <td colspan="4">{{ $permisos->doc_informacion }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h6 class="font-weight-bold">III. ANTECEDENTES FINANCIAMIENTO</h6>
                <table class="table-sm table-striped table-bordered">
                    <tr>
                        <th>Concepto</th>
                        <th>Monto</th>
                    </tr>
                    <tr>
                        <th>Viatico</th>
                        <td>{{ $permisos->viatico->valor ?? ''}}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <span class="float-left font-weight-bold fixed-bottom">V°B° JEFE DIRECTO</span>
            </div>
            <div class="col">
                <span class="float-right font-weight-bold fixed-bottom">FIRMA JEFE CAPACITACIÓN</span>
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <div class="col">
                    <span class="font-weight-bold fixed-bottom">FIRMA INTERESADO(A)</span>
                </div>
            </div>
        </div>
    </div>
    <style>

        html{
            font-size: xx-small;
        }
        body{
            background: #ffffff;
        }
    </style>
@stop
