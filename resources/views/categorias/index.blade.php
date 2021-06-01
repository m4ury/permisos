@extends('adminlte::page')
@section('title', 'categorias')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h2 class="title">Categorias</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sx-12 col-md-12 table-responsive">
            <table class="table table-hover table-md-responsive table-bordered" id="categorias-table">
                <thead class="thead-light">
                <tr>
                    <th>Fecha creación</th>
                    <th>Nombre Categoria</th>
                    <th>Descripción</th>
                    {{--<th class="text-center" colspan="2">Acciones</th>--}}
                </tr>
                </thead>
                <tbody>
                @foreach($categorias as $categoria)
                    <tr>
                        <td nowrap>{{ Carbon\Carbon::parse($categoria->created_at)->format("d-m-Y") }}</td>
                        <td>{{ $categoria->nombre_categoria }}</td>
                        <td>{{ $categoria->descripcion_categoria }}</td>

                        {{-- {!! Form::open(['route' => ['categorias.destroy', $categoria->id], 'method' => 'DELETE']) !!}
                        <td><a class="btn btn-outline-primary btn-sm" data-toggle="tooltip" data-placement="top"
                               title="Editar" href="{{ url('categorias/'.$categoria->id.'/edit') }}"><i
                                        class="fas fa-pen"></i></a></td>
                        <td>{!! Form::button('<i class="fas fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-simple btn-sm', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Eliminar','onclick'=>'return confirm("seguro desea eliminar esta Categoria?")'] ) !!}
                            {!! Form::close() !!}
                        </td> --}}
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="form-group d-inline-flex align-self-stretch">
                <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#categoria"><i
                        class="fas fa-calendar-check"></i>
                    Nueva Categoria
                </button>
            </div>
        </div>
    </div>
    @include('categorias.modal')
    
@section('js')
    <script>
        $("#categorias-table").DataTable(
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
@endsection

