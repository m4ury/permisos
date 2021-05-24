@extends('adminlte::page')
@section('title', 'categorias')
@section('content')
    <div class="row justify-content-left">
        <div class="col-sx-8 col-sm-8 col">
            <div class="card card-success card-outline">
            <div class="card-header"><i class="fas fa-calendar-check"></i> Nueva Categoria</div>
                <div class="card-body">
            <form action="{{ route('categorias.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" name="nombre_categoria"
                           class="form-control {{ ($errors->has('nombre_categoria') ? ' is-invalid' : '') }}"
                           placeholder="Nombre de la Categoria"
                           required autofocus>
                    @if ($errors->has('nombre_categoria'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('nombre_categoria') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <input type="text" name="descripcion_categoria" class="form-control"
                           placeholder="Descripción de la Categoria">
                </div>
                <button type="submit" class="btn btn-success btn-block">Guardar Categoria</button>
                <a href="{{ route('reuniones.index') }}" class="btn btn-secondary btn-block">Volver</a>
            </form>
            <hr>
            <table class="table table-hover table-striped">
                <thead class="thead-dark">
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
            <div>
                {{ $categorias->links() }}
            </div>
        </div>
    </div>
        </div>
    </div>
@endsection

