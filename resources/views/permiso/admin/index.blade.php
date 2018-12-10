@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="py-5 text-center">
            <h2 class="title">Permisos</h2>
        </div>

        @if(session()->has('info'))
            <div id="alert" class="alert alert-success text-center"><strong>{{ session('info') }}</strong></div>
        @elseif(session()->has('danger'))
            <div id="alert" class="alert alert-danger text-center"><strong>{{ session('danger') }}</strong></div>
        @endif

        <div class="row">
           {{--{{dd($permisos)}}--}}
            <div class="table">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Correlativo</th>
                        <th>Desde</th>
                        <th>Hasta</th>
                        <th>Dia inicio</th>
                        <th>Dia fin</th>
                        <th>Descripcion</th>
                        <th>Estado</th>
                        <th>Tipo</th>
                        <th>Viatico</th>
                        <th>Movilizacion</th>
                        <th>Lugar</th>
                        <th>Creado</th>
                        <th>Modificado</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($permisos as $permiso)

                        <tr>
                            <td>{{ $permiso->correlativo }}</td>
                            <td>{{ Carbon\Carbon::parse($permiso->hora_inicio)->format("H:i") }}</td>
                            <td>{{ Carbon\Carbon::parse($permiso->hora_fin)->format("H:i") }}</td>
                            <td>{{ $permiso->dia_inicio }}</td>
                            <td>{{ $permiso->dia_fin }}</td>
                            <td>{{ $permiso->descripcion }}</td>
                            <td>{{ $permiso->estado }}</td>
                            <td>{{ $permiso->tipo }}</td>
                            <td>{{ $permiso->viatico }}</td>
                            <td>{{ $permiso->movilizacion }}</td>
                            <td>{{ $permiso->lugar }}</td>
                            <td>{{ $permiso->created_at }}</td>
                            <td>{{ $permiso->updated_at }}</td>

                            <td class="td-actions pull-right" >

                                {!! Form::open(['route' => ['permisos.destroy', $permiso->id], 'method' => 'DELETE']) !!}
                                @csrf
                                <a href="{{ url('permiso/'. $permiso->id) }}" id="info" type="button" rel="tooltip"  title="View Profile" class="btn btn-info btn-simple btn-xs">
                                    <i class="fas fa-user-check"></i>
                                </a>
                                <a href="{{ url('permiso/'.$permiso->id.'/edit') }}"  rel="tooltip" title="Edit Profile" class="btn btn-success btn-simple btn-xs">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>

                                {!! Form::button('<i class="fa fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-simple btn-xs', 'id' => 'delete'] ) !!}


                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="form-group">
                    <a id="new" class="btn btn-success" href="{{ route('permisos.create') }}">
                        Nuevo <i class="fas fa-user-plus"></i>
                    </a>
                </div>
                <div>
                    {{ $permisos->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <!-- <script src="{{ asset('js/test.js') }}"></script> -->
    <script>
        $(document).ready(function(){
            $('#alert').delay(2000).slideUp(200, function(){
                $(this).remove();
            });
        }, 5000);
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#delete').click(function(e) {
                if (confirm('Desea eliminar este registro?')) {
                    return;
                }
                e.stopImmediatePropagation();
                e.preventDefault();
            });
        });
    </script>
@stop