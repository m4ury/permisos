@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-md-12">
            @if(session()->has('success'))
                <div id="alert" class="alert alert-success text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{ session('success') }}</strong>
                </div>
            @endif
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        Dash Board
                    </div>
                    <div class="row card-body">
                        <div class="col-4" style="width: 250px; display: inline-block">
                            <button type="button" class="btn btn-primary">
                                Embarazadas <span class="badge badge-light">{{ $TotalEmbarazadasHoy ?? 0 }}</span>
                            </button>
                        </div>
                        <div class="col-4" style="width: 250px">
                            <button type="button" class="btn btn-primary">
                                Otro <span class="badge badge-light">4</span>
                            </button>
                        </div>
                        <div class="col-4" style="width: 250px">
                            <button type="button" class="btn btn-primary">
                                6 a meses a 10 años  <span class="badge badge-light">4</span>
                            </button>
                        </div>
                    </div>
                    <div class="row card-body">
                        <div class="col">
                            <button type="button" class="btn btn-primary">
                                Fun. publicos <span class="badge badge-light">4</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
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
                    <th>F. vacunación</th>
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
                        <td>{{ \Carbon\carbon::parse($vacuna->vacuna_fecha)->format("d-m-Y") }}</td>
                        <td>{{ $vacuna->paciente->paciente_rut }}</td>
                        <td>{{ $vacuna->paciente->paciente_nombres }}</td>
                        <td>{{ $vacuna->paciente->fecha_nacimiento }}</td>
                        <td>{{ Carbon\Carbon::createFromDate($vacuna->paciente->fecha_nacimiento)->age }}</td>
                        <td>{{ $vacuna->paciente->tipo->tipo_nombre }}</td>

                        <td>
                            <a class="btn bg-gradient-secondary btn-sm disabled" data-toggle="tooltip"
                               data-placement="bottom"
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
    <script>
        $(document).ready(function () {
            $('#alert').delay(2000).slideUp(200, function () {
                $(this).remove();
            });
        }, 5000);
    </script>
@stop
