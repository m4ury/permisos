@extends('layouts.app')
@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="page-header mb-3">
                    <h2 class="title">Reuniones
                        {!! Form::open(['route' => 'reuniones.index', 'method' => 'GET', 'class' => 'form-inline float-right']) !!}
                        <div class="form-group mx-1">
                            {{ Form::text('titulo_reunion', null, ['class' => 'form-control', 'placeholder' => 'Titulo reunión']) }}
                        </div>
                        <div class="form-group mx-1">
                            {{ Form::date('dia_reunion', null, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group mx-1">
                            <button type="submit" class="btn btn-secondary form-control"><span><i
                                            class="material-icons">search</i></span></button>
                        </div>
                        {!! Form::close() !!}
                    </h2>
                </div>
            </div>
        </div>

        @if(session()->has('success'))
            <div id="alert" class="alert alert-success text-center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>{{ session('success') }}</strong>
            </div>
        @elseif(session()->has('danger'))
            <div id="alert" class="alert alert-danger text-center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>{{ session('danger') }}</strong>
            </div>
        @endif

        <div class="row">
            <div class="col-sx-12 col-md-12">
                <table class="table table-hover table-sm-responsive">
                    <thead class="thead-dark">
                    <tr>
                        <th>Dia</th>
                        <th>Hora Inicio</th>
                        <th>Hora Fin</th>
                        <th>Titulo Reunión</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($reuniones as $reunion)

                        <tr>
                            <td>{{ Carbon\Carbon::parse($reunion->dia_reunion)->format("d-m-Y") }}</td>
                            <td>{{ Carbon\Carbon::parse($reunion->inicio_reunion)->format("H:i") }}</td>
                            <td>{{ Carbon\Carbon::parse($reunion->fin_reunion)->format("H:i") }}</td>
                            <td>{{ $reunion->titulo_reunion }}</td>

                            <td><a class="btn btn-outline-primary" href="{{ url('reuniones/'.$reunion->id) }}"
                                   target="_blank">Detalle <i class="fas fa-file-pdf"></i></a></td>

                            <td><a class="btn btn-outline-primary"
                                   href="{{ url('reuniones/'.$reunion->id.'/edit') }}"><i
                                            class="material-icons">edit</i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="form-group d-inline-flex align-self-stretch">
                    <a id="new" class="btn btn-success mx-2" href="{{ route('reuniones.create') }}">
                        <i class="material-icons">add_circle</i>
                    </a>
                    <a href="{{ route('home') }}" class="btn btn-secondary">Atras</a>

                </div>
                <div>
                    {{ $reuniones->links() }}
                </div>
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