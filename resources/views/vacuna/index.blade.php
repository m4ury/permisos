@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-md-12">

            {{--        success alert al crear--}}

            {{--<div class="page-header">
                <div class="form-group">
                    {!! Form::open(['route' => 'vacuna.index', 'method' => 'GET', 'class' => 'form-inline float-right pb-2'])
                    !!}
                    {{ Form::text('q', null, ['class' => 'form-control mx-1', 'placeholder' => 'Buscar'], isset($q) ? $q : '') }}
                    <button type="submit" class="btn btn-secondary form-control"><span><i
                                    class="fas fa-search"></i></span></button>
                    {!! Form::close() !!}
                </div>
            </div>--}}
        </div>
        <div class="col-sm-6">
            <a class="btn btn-success btn-sm" title="Nuevo Registro" href="{{ route('vacunas.create') }}">
                <i class="fas fa-syringe"></i>
                Nuevo registro
            </a>
        </div>
        <div class="col-md-12 pt-3">
            <table class="table table-hover table-sm table-bordered">
                <thead class="thead-light">
                <tr>
                    <th>Rut</th>
                    <th>Nombre Completo</th>
                    <th>Fecha Nacimiento</th>
                    <th>Edad</th>
                    <th>Tipo Objetivo</th>
                    <th colspan="2" class="text-center">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($vacunas as $vacuna)
                    <tr>
                        <td>{{ $vacuna->paciente->paciente_rut ?? '' }}</td>
                        <td>{{ $vacuna->paciente->paciente_nombres ?? '' }}</td>
                        <td>{{ $vacuna->paciente->fecha_nacimiento ?? '' }}</td>
                        <td>edad</td>
                        <td>{{ $vacuna->paciente->tipo->tipo_nombre ?? '' }}</td>

                        <td>
                            <a class="btn bg-gradient-secondary btn-sm" data-toggle="tooltip" data-placement="bottom"
                               title="Editar"
                               href="{{ route('vacunas.edit', $vacuna->id) }}"><i class="fas fa-pen"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $vacunas->links() }}
        </div>
    </div>
@stop
