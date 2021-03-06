@extends('layouts.app')
@section('content')

<div class="container">
    <div class="py-5 text-center">
        <h2 class="title">Cometidos</h2>
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
                <div class="col">
                    <table class="table table-striped table">
                        <thead>
                            <tr>
                                <th>Dia inicio</th>
                                <th>Dia fin</th>
                                <th>Hora Inicio</th>
                                <th>Hora Fin</th>
                                <th>Nº Resolucion</th>
                                <th>Fecha Resolucion</th>
                                <th>Motivo</th>
                                <th>Lugar</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($permisosUsuario as $permiso)

                            <tr>
                                <td>{{ $inicio = Carbon\Carbon::parse($permiso->dia_inicio)->format("d-m-Y") }}</td>
                                <td>{{ $fin = Carbon\Carbon::parse($permiso->dia_fin)->format("d-m-Y") }}</td>

                                <td>{{ Carbon\Carbon::parse($permiso->hora_inicio)->format("H:i") }}</td>
                                <td>{{ Carbon\Carbon::parse($permiso->hora_fin)->format("H:i") }}</td>
                                {{--<td>{{ Carbon\Carbon::parse($permiso->dia_fin)->diffInMinutes(Carbon\Carbon::parse($permiso->dia_inicio)) }}</td>--}}
                                <td>{{ $permiso->correlativo }}</td>

                                <td>{{ $inicio = Carbon\Carbon::parse($permiso->created_at)->format("d-m-Y") }}</td>
                                <td>{{ $permiso->descripcion }}</td>
                                <td>{{ $permiso->lugar }}</td>
                                <td><a class="btn btn-outline-primary" href="{{ route('permisos.create') }}">Print <i class="fas fa-print"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="form-group">
                        <a id="new" class="btn btn-success" href="{{ route('permisos.create') }}">
                            Nuevo <i class="fas fa-plus"></i>
                        </a>
                        <a href="{{ route('home') }}" class="btn btn-secondary">Atras</a>

                    </div>
                    <div>
                        {{ $permisosUsuario->links() }}
                    </div>
                </div>
            </div>

</div>
@stop