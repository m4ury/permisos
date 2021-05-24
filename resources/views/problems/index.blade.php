@extends('adminlte::page')
@section('title', 'problemas')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h2 class="title">Problemas Reloj Control</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sx-12 col-md-12 table-responsive">
            <table class="table table-hover table-md-responsive table-bordered" id="problemas">
                <thead class="thead-light">
                <tr>
                    <th>Dia problema</th>
                    <th>Entrada</th>
                    <th>Salida</th>
                    <th>Descripcion</th>
                    <th>Fecha Documento</th>
                    <th class="text-center">Documento</th>
                </tr>
                </thead>
                <tbody>
                @foreach($problems as $problema)
                    <tr>
                        <td nowrap="">{{ Carbon\Carbon::create($problema->fecha_problema)->locale("es")->dayName." ".Carbon\Carbon::parse($problema->fecha_problema)->format('d')." de ".Carbon\Carbon::create($problema->fecha_problema)->locale("es")->monthName." del año ".Carbon\Carbon::parse($problema->fecha_problema)->format("Y") }}</td>
                        <td>{{ $problema->entrada }}</td>
                        <td>{{ $problema->salida }}</td>
                        <td>{{ $problema->comentario_problema }}</td>
                        <td>{{ $problema->created_at }}</td>
                        <td>
                        <td>
                            <a class="btn btn-outline-primary btn-sm" data-toggle="tooltip" data-placement="bottom"
                               title="Cometido" href="{{ url('problems/'.$problema->id) }}"
                               target="_blank"><i class="fas fa-clock"></i></a>
                        </td>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="form-group d-inline-flex align-self-stretch">
                <a id="new" class="btn btn-success mx-2" href="{{ route('problems.create') }}">Nuevo
                    <i class="fas fa-clock-o"></i>
                </a>
                <a href="{{ route('home') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Atras</a>
            </div>
        </div>
    </div>
@section('js')
    <script>
        $("#problemas").DataTable(
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
