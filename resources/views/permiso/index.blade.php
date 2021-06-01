@extends('adminlte::page')
@section('title', 'permisos')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h2 class="title">Cometidos</h2>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sx-12 col-md-12 table-responsive">
        <table class="table table-hover table-md-responsive table-bordered" id="permisos">
            <thead class="thead-light">
                <tr>
                    <th>Dia Inicio</th>
                    <th>Dia Fin</th>
                    <th>Hora Inicio</th>
                    <th>Hora Fin</th>
                    <th>Nº Resolucion</th>
                    <th>Fecha Resolucion</th>
                    <th>Motivo</th>
                    <th>Lugar</th>
                    <th class="text-center">Documentos</th>
                    <th>Acciones</th>
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
                    <td>
                        <a class="btn btn-outline-primary btn-sm" data-toggle="tooltip" data-placement="bottom"
                            title="Cometido" href="{{ url('permisos/'.$permiso->id) }}" target="_blank"><i
                                class="fas fa-calendar-day"></i></a>
                        @if($permiso->es_capacitacion)
                        <a class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="bottom"
                            title="Capacitacion" href="{{ url('capacitacion/'.$permiso->id) }}" target="_blank"><i
                                class="fas fa-book"></i></a>
                        @endif
                        @if($permiso->incluye_viatico)
                        <a class="btn btn-outline-success btn-sm" data-toggle="tooltip" data-placement="bottom"
                            title="Viatico" href="{{ url('viaticos/'.$permiso->viatico->id) }}" target="_blank"><i
                                class="fas fa-file-invoice-dollar"></i></a>
                    </td>
                    @endif
                    <td>
                        {!! Form::open(['route' => ['permisos.destroy', $permiso->id], 'method' => 'DELETE']) !!}
                        {!! Form::button('<i class="fas fa-trash"></i>', ['type' => 'submit', 'class' => 'btn
                        btn-outline-danger btn-sm', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' =>
                        'Eliminar','onclick'=>'return confirm("seguro desea eliminar esta Registro?")'] ) !!}
                        {!! Form::close() !!}
                    </td>
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
    </div>
</div>
@section('js')
<script>
    $("#permisos").DataTable(
            {
                dom: 'Bfrtip',
                buttons: [
                    'colvis',
                    'excel',
                    'pdf',
                    'print',
                ],
                language:
                    {
                        "processing": "Procesando...",
                        "lengthMenu": "Mostrar _MENU_ registros",
                        "zeroRecords": "No se encontraron resultados",
                        "emptyTable": "Ningún dato disponible en esta tabla",
                        "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                        "search": "Buscar:",
                        "infoThousands": ",",
                        "loadingRecords": "Cargando...",
                        "paginate": {
                            "first": "Primero",
                            "last": "Último",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        },
                        "aria": {
                            "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                            "sortDescending": ": Activar para ordenar la columna de manera descendente"
                        }
                    },
            });
</script>
<script>
    $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
</script>
@endsection
@stop
