@extends('adminlte::page')
@section('title', 'reuniones')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h2 class="title">Reuniones</h2>
            </div>
        </div>
    </div>
    <div class="col-sx-12 col-md-12">
        <table id="reunion" class="table table-hover table-sm-responsive">
            <thead class="thead-light">
                <tr>
                    <th>Dia</th>
                    <th>Hora Inicio</th>
                    <th>Hora Fin</th>
                    <th>Titulo Reunión</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reuniones as $reunion)
                <tr>
                    <td>{{ Carbon\Carbon::parse($reunion->dia_reunion)->format("d-m-Y") }}</td>
                    <td>{{ Carbon\Carbon::parse($reunion->inicio_reunion)->format("H:i") }}</td>
                    <td>{{ Carbon\Carbon::parse($reunion->fin_reunion)->format("H:i") }}</td>
                    <td>{{ $reunion->titulo_reunion }}</td>
                    {!! Form::open(['route' => ['reuniones.destroy', $reunion->id], 'method' => 'DELETE']) !!}
                    <td class="text-center"><a class="btn btn-outline-primary btn-sm" data-toggle="tooltip"
                            data-placement="bottom" title="Detalle Pdf" href="{{ url('reuniones/'.$reunion->id) }}"
                            target="_blank"><i class="fas fa-file-pdf"></i></a>
                        <a class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="bottom"
                            title="Editar" href="{{ url('reuniones/'.$reunion->id.'/edit') }}"><i
                                class="fas fa-pen"></i>
                        </a>
                            {!! Form::button('<i class="fas fa-trash"></i>', ['type' => 'submit', 'class' => 'btn
                        btn-outline-danger btn-sm', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' =>
                        'Eliminar','onclick'=>'return confirm("seguro desea eliminar este Registro?")'] ) !!}
                            {!! Form::close() !!}
                        {{--{!! Form::button('<i class="fas fa-trash"></i>', ['type' => 'submit', 'class' => 'btn
                        btn-outline-danger btn-sm', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' =>
                        'Eliminar','onclick'=>'return confirm("seguro desea eliminar este Registro?")'] ) !!}
                        {!! Form::close() !!}--}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="form-group d-inline-flex align-items-center">
            <a id="new" class="btn btn-success mx-2" href="{{ route('reuniones.create') }}">Nuevo
                <i class="fas fa-plus"></i>
            </a>
            <a href="{{ route('home') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Atras</a>
        </div>
        <div>
            {{ $reuniones->links() }}
        </div>
    </div>
@section('js')
<script>
    $("#reunion").DataTable(
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
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
</script>
@endsection
@stop
