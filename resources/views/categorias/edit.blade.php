@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Editando Categoria</div>
                    @if(session()->has('info'))
                        <div class="alert alert-success">{{ session('info') }}</div>
                    @elseif(session()->has('danger'))
                        <div id="alert" class="alert alert-danger text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>{{ session('danger') }}</strong>
                        </div>
                    @endif
                    <div class="card-body">
                        {{ Form::open([ 'url' => 'categorias', 'method' => 'POST', 'action' => route('categorias.edit', $categoria->id)]) }}
                        @csrf
                        {{ method_field('PATCH') }}

                        <div class="form-group">
                            {!! Form::label('nombre_categoria', 'Nombre categoria') !!} {!! Form::text('nombre_categoria', $categoria->nombre_categoria, ['class' => 'form-control'.($errors->has('nombre_categoria') ? ' is-invalid' : '')]) !!}
                            @if ($errors->has('nombre_categoria'))
                                <span class="invalid-feedback">
        <strong>{{ $errors->first('nombre_categoria') }}</strong>
    </span>
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('descripcion_categoria', 'Descripcion') !!} {!! Form::text('descripcion_categoria', $categoria->descripcion_categoria, ['class' => 'form-control obs_reunion'.($errors->has('descripcion_categoria') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese descripcion']) !!}
                            @if ($errors->has('descripcion_categoria'))
                                <span class="invalid-feedback">
        <strong>{{ $errors->first('descripcion_categoria') }}</strong>
    </span>
                            @endif
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col">
                                {{ Form::submit('Guardar', ['class' => 'btn btn-primary btn-lg btn-block']) }}
                            </div>
                            <div class="col">
                                <a href="{{ url('categorias') }}">
                                    {{ Form::button('Cancelar', ['class' => 'btn btn-secondary btn-lg btn-block'] ) }}
                                </a>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection