@extends('layouts.app')
@section('content')

<div class="container">
    <div class="py-5 text-center">
        <h2 class="title">Permiso Salida Especial</h2>
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
                                <th>Fecha Solicitud</th>
                                <th>Hora Salida</th>
                                <th>Hora Llegada</th>
                                <th>Minutos Ocupado</th>
                                <th>Motivo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($salidaUsuario as $salida)

                            <tr>
                                <td>{{ Carbon\Carbon::parse($salida->dia_salida)->format("d-m-Y") }}</td>

                                <td>{{ $hora_salida = Carbon\Carbon::parse($salida->hora_salida)->format("H:i") }}</td>
                                <td>{{ $hora_llegada = Carbon\Carbon::parse($salida->hora_llegada)->format("H:i") }}</td>

                                <td>{{ Carbon\Carbon::parse($hora_llegada)->diffInMinutes(Carbon\Carbon::parse($hora_salida)) }}</td>

                                <td>{{ strtoupper($salida->descripcion) }}</td>
                                <td><a class="btn btn-outline-primary" href="{{ url('salidas/'.$salida->id) }}" target="_blank">Print <i class="fas fa-print"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="form-group">
                        <a id="new" class="btn btn-success" href="{{ route('salidas.create') }}">
                            Nuevo <i class="fas fa-plus"></i>
                        </a>
                        <a href="{{ route('home') }}" class="btn btn-secondary">Atras</a>

                    </div>
                    <div>
                        {{ $salidaUsuario->links() }}
                    </div>
                </div>
            </div>

</div>
@stop