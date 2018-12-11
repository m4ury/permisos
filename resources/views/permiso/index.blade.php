@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="py-5 text-center">
            <h2 class="title">Permisos {{ Auth::user()->name }} {{ Auth::user()->apellido_paterno }}</h2>
        </div>

        @if(session()->has('info'))
            <div id="alert" class="alert alert-success text-center"><strong>{{ session('info') }}</strong></div>
        @elseif(session()->has('danger'))
            <div id="alert" class="alert alert-danger text-center"><strong>{{ session('danger') }}</strong></div>
        @endif

        <div class="row">
           {{--{{dd(permisosUsuario)}}--}}
            <div class="table">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Solicitado</th>
                        <th>Dia inicio</th>
                        <th>Dia fin</th>
                        <th>Descripcion</th>
                        <th>Lugar</th>
                        <th>Tipo</th>
                        <th>Estado</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{--{{ dd($permisosUsuario) }}--}}

                    @foreach($permisosUsuario as $permiso)

                        <tr>
                           {{-- <td>{{ $permiso->correlativo }}</td>
                            <td>{{ Carbon\Carbon::parse($permiso->hora_inicio)->format("H:i") }}</td>
                            <td>{{ Carbon\Carbon::parse($permiso->hora_fin)->format("H:i") }}</td>--}}
                            <td>{{ $permiso->created_at }}</td>
                            <td>{{ $permiso->dia_inicio }}</td>
                            <td>{{ $permiso->dia_fin }}</td>
                            <td>{{ $permiso->descripcion }}</td>
                            <td>{{ $permiso->lugar }}</td>
                            <td>{{ $permiso->tipo }}</td>
                            <td>{{ $permiso->estado }}</td>



                            {{--<td class="td-actions pull-right" >

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
                            </td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="form-group">
                    <a id="new" class="btn btn-success" href="{{ route('permisos.create') }}">
                        Nuevo <i class="fas fa-user-plus"></i>
                    </a>
                    <a href="{{ route('home') }}" class="btn btn-secondary">Atras</a>

                </div>
                <div>
                    {{ $permisosUsuario->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <script src="{{ asset('js/jquery.js') }}"></script>
@stop