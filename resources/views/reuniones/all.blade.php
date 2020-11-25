@extends('layouts.app')
@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="page-header mb-3">
                    <h2 class="title">Reuniones
                    </h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sx-12 col-md-12 table-responsive-sm">
                <table class="table table-hover table-sm-responsive table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th>Dia</th>
                        <th>Hora Inicio</th>
                        <th>Hora Fin</th>
                        <th>Titulo Reunión</th>
                        <th colspan="2" class="text-center">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($reuniones as $reunion)

                        <tr>
                            <td>{{ Carbon\Carbon::parse($reunion->dia_reunion)->format("d-m-Y") }}</td>
                            <td>{{ Carbon\Carbon::parse($reunion->inicio_reunion)->format("H:i") }}</td>
                            <td>{{ Carbon\Carbon::parse($reunion->fin_reunion)->format("H:i") }}</td>
                            <td>{{ $reunion->titulo_reunion }}</td>

                            <td><a class="btn btn-outline-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Detalle Pdf" href="{{ url('reuniones/'.$reunion->id) }}"
                                   target="_blank"><i class="fas fa-file-pdf"></i></a></td>

                            <td><a class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Editar"
                                   href="{{ url('reuniones/'.$reunion->id.'/edit') }}"><i class="fas fa-pen"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="form-group d-inline-flex align-self-stretch">
                    <a id="new" class="btn btn-success mx-2" href="{{ route('reuniones.create') }}">Nuevo
                        <i class="fas fa-plus"></i>
                    </a>
                    <a href="{{ route('home') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Atras</a>

                </div>
                <div>
                    {{ $reuniones->links() }}
                </div>
            </div>
        </div>
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@stop
