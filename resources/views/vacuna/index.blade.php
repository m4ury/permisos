@extends('adminlte::page')
@section('title', 'vacunas')
@section('content')
    <div class="container">
        <div class="row pb-3">
            <div class="col-sm-2 pb-2">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">
                            Vacunados Total
                        </h6>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary btn-sm mb-2" style="width: 100%">
                            Total: <span class="badge badge-light">{{ $totalVacunados }}</span>
                        </button>
                        <button type="button" class="btn btn-secondary btn-sm" style="width: 100%">
                            Hoy: <span class="badge badge-light">{{ $totalVacunadosHoy }}</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-sm-2 pb-2">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">
                            Embarazadas
                        </h6>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary btn-sm mb-2" style="width: 100%">
                            Total: <span class="badge badge-light">{{ $totalEmbarazadas }}</span>
                        </button>
                        <button type="button" class="btn btn-secondary btn-sm" style="width: 100%">
                            Hoy: <span class="badge badge-light">{{ $totalEmbarazadasHoy }}</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-sm-2 pb-2">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">
                            Personal de Salud Público
                        </h6>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary btn-sm mb-2" style="width: 100%">
                            Total: <span class="badge badge-light">{{ $totalFunPublicos }}</span>
                        </button>
                        <button type="button" class="btn btn-secondary btn-sm" style="width: 100%">
                            Hoy: <span class="badge badge-light">{{ $totalFunPublicosHoy }}</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-sm-2 pb-2">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">
                            Personal de Salud Privado
                        </h6>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary btn-sm mb-2" style="width: 100%">
                            Total: <span class="badge badge-light">{{ $totalFunPrivado }}</span>
                        </button>
                        <button type="button" class="btn btn-secondary btn-sm" style="width: 100%">
                            Hoy: <span class="badge badge-light">{{ $totalFunPrivadoHoy }}</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-sm-2 pb-2">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">
                            6 meses a 10 años
                        </h6>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary btn-sm mb-2" style="width: 100%">
                            Total: <span class="badge badge-light">{{ $total0610 }}</span>
                        </button>
                        <button type="button" class="btn btn-secondary btn-sm" style="width: 100%">
                            Hoy: <span class="badge badge-light">{{ $total0610Hoy }}</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-sm-2 pb-2">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">
                            Crónico entre 11 y 64 años
                        </h6>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary btn-sm mb-2" style="width: 100%">
                            Total: <span class="badge badge-light">{{ $totalCronico1164 }}</span>
                        </button>
                        <button type="button" class="btn btn-secondary btn-sm" style="width: 100%">
                            Hoy: <span class="badge badge-light">{{ $totalCronico1164Hoy }}</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-sm-2 pb-2">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">
                            65 y mas años
                        </h6>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary btn-sm mb-2" style="width: 100%">
                            Total: <span class="badge badge-light">{{ $total65Mas }}</span>
                        </button>
                        <button type="button" class="btn btn-secondary btn-sm" style="width: 100%">
                            Hoy: <span class="badge badge-light">{{ $total65MasHoy }}</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-sm-2 pb-2">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">
                            Trab. avicolas y criadores de cerdos
                        </h6>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary btn-sm mb-2" style="width: 100%">
                            Total: <span class="badge badge-light">{{ $totalAvicolasCerdos }}</span>
                        </button>
                        <button type="button" class="btn btn-secondary btn-sm" style="width: 100%">
                            Hoy: <span class="badge badge-light">{{ $totalAvicolasCerdosHoy }}</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-sm-2 pb-2">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">
                            Otros
                        </h6>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary btn-sm mb-2" style="width: 100%">
                            Total: <span class="badge badge-light">{{ $totalOtros }}</span>
                        </button>
                        <button type="button" class="btn btn-secondary btn-sm" style="width: 100%">
                            Hoy: <span class="badge badge-light">{{ $totalOtrosHoy }}</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
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
    </div>
    <script>
        $(document).ready(function () {
            $('#alert').delay(2000).slideUp(200, function () {
                $(this).remove();
            });
        }, 5000);
    </script>
@stop
