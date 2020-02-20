@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="page-header mb-3">
                <h2 class="title">Cometidos
                    {!! Form::open(['route' => 'permisos.index', 'method' => 'GET', 'class' => 'form-inline float-right']) !!}
                    <div class="form-group mx-1">
                        {{ Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'motivo']) }}
                    </div>
                    {{--<div class="form-group mx-1">
                        {{ Form::date('dia_inicio', null, ['class' => 'form-control']) }}
                    </div>--}}
                    {{--<div class="form-group mx-1">
                        {{ Form::select('mes', ['01' => 'Enero', '02' => 'Febrero', '03' => 'Marzo', '04' => 'Abril', '05' => 'Mayo', '06' => 'Junio', '07' => 'Julio', '08' => 'Agosto', '09' => 'Septiembre', '10' => 'Octubre', '11' => 'Noviembre', '12' => 'Diciembre' ], null, ['class' => 'form-control', 'placeholder' => 'Mes ...']) }}
                    </div>--}}
                    <div class="form-group mx-1">
                        <button type="submit" class="btn btn-secondary form-control"><span><i class="material-icons">search</i></span>
                        </button>
                    </div>
                    {!! Form::close() !!}
                </h2>
            </div>
        </div>
    </div>

    @if(session()->has('info'))
        <div id="alert" class="alert alert-success text-center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{ session('info') }}</strong>
        </div>
    @elseif(session()->has('danger'))
        <div id="alert" class="alert alert-danger text-center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{ session('danger') }}</strong>
        </div>
    @endif

    <div class="row">
        <div class="col-sx-12 col-md-12">
            <table class="table table-hover table-sm-responsive">
                <thead class="thead-dark">
                <tr>
                    <th>Dia Inicio</th>
                    <th>Dia Fin</th>
                    <th>Hora Inicio</th>
                    <th>Hora Fin</th>
                    <th>Nº Resolucion</th>
                    <th>Fecha Resolucion</th>
                    <th>Motivo</th>
                    <th>Lugar</th>
                    <th class="text-center" colspan="3">Acciones</th>
                </tr>
                </thead>
                <tbody>

                @foreach($permisos as $permiso)

                    <tr>
                        <td nowrap>{{ Carbon\Carbon::parse($permiso->dia_inicio)->format("d-m-Y") }}</td>
                        <td nowrap>{{ Carbon\Carbon::parse($permiso->dia_fin)->format("d-m-Y") }}</td>
                        <td>{{ Carbon\Carbon::parse($permiso->hora_inicio)->format("H:i") }}</td>
                        <td>{{ Carbon\Carbon::parse($permiso->hora_fin)->format("H:i") }}</td>
                        <td>{{ $permiso->id }}</td>

                        <td>{{ Carbon\Carbon::parse($permiso->created_at)->format("d-m-Y") }}</td>
                        <td>{{ $permiso->descripcion }}</td>
                        <td>{{ $permiso->lugar }}</td>
                        <td><a class="btn btn-outline-primary btn-sm" data-toggle="tooltip" data-placement="bottom"
                               title="Cometido" href="{{ url('permisos/'.$permiso->id) }}"
                               target="_blank"><i class="fas fa-calendar-day"></i></a></td>

                        @if($permiso->es_capacitacion)
                            <td><a class="btn btn-outline-secondary btn-sm" data-toggle="tooltip"
                                   data-placement="bottom" title="Capacitacion"
                                   href="{{ url('capacitacion/'.$permiso->id) }}"
                                   target="_blank"><i class="fas fa-book"></i></a></td>
                        @endif

                        @if($permiso->incluye_viatico)
                            <td><a class="btn btn-outline-success btn-sm" data-toggle="tooltip" data-placement="bottom"
                                   title="Viatico" href="{{ url('viaticos/'.$permiso->viatico->id) }}"
                                   target="_blank"><i class="fas fa-file-invoice-dollar"></i></a></td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="form-group d-inline-flex align-self-stretch">
                <a id="new" class="btn btn-success mx-2" href="{{ route('permisos.create') }}">Nuevo
                    <i class="fas fa-plus"></i>
                </a>
                <a href="{{ route('home') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Atras</a>

            </div>
            <div>
                {{ $permisos->links() }}
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#alert').delay(2000).slideUp(200, function () {
                $(this).remove();
            });
        }, 5000);
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@stop
