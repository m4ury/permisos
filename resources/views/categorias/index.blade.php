@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-7">
            <table class="table table-hover">
                <thead class="thead-dark">
                <tr>
                    <th>Fecha creación</th>
                    <th>Nombre Categoria</th>
                    <th>Descripción</th>
                    <th class="text-center" colspan="2">Acciones</th>
                </tr>
                </thead>
                <tbody>

                @foreach($categorias as $categoria)
                    <tr>
                        <td>{{ Carbon\Carbon::parse($categoria->created_at)->format("d-m-Y") }}</td>
                        <td>{{ $categoria->nombre_categoria }}</td>
                        <td>{{ $categoria->descripcion_categoria }}</td>

                        {!! Form::open(['route' => ['categorias.destroy', $categoria->id], 'method' => 'DELETE']) !!}
                        <td><a class="btn btn-outline-primary" href="{{ url('categorias/'.$categoria->id.'/edit') }}"><i
                                        class="material-icons">edit</i></a></td>
                        <td>{!! Form::button('<i class="material-icons">delete</i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-simple btn-xs', 'onclick'=>'return confirm("seguro?")'] ) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
                {{ $categorias->links() }}
            </div>
        </div>
        <div class="col-md-5">
            <h3 class="text-center mb-4"> Agregar Categorias</h3>
            <form action="{{ route('categorias.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" name="nombre_categoria" class="form-control" placeholder="Nombre de la Categoria"
                           required autofocus>
                </div>
                <div class="form-group">
                    <input type="text" name="descripcion_categoria" class="form-control"
                           placeholder="Descripción de la Categoria">
                </div>
                <button type="submit" class="btn btn-success btn-block">Guardar Categoria</button>
                <a href="{{ route('reuniones.index') }}" class="btn btn-secondary btn-block">Volver</a>
            </form>
            @if(session('success'))
                <div id="alert" class="alert alert-success mt-3">{{ session('success') }}</div>
            @endif
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