@extends('adminlte::page')
@section('title', 'nueva-reunion')
@section('content')
    <div class="row justify-content-left">
        <div class="col-sx-8 col-sm-8 col">
            <div class="card card-info card-outline">
                <div class="card-header"><i class="fas fa-users"></i> Nueva Reunion</div>
                {{--@if(session()->has('info'))
                    <div class="alert alert-success">{{ session('info') }}</div>
                @elseif(session()->has('danger'))
                    <div id="alert" class="alert alert-danger text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>{{ session('danger') }}</strong>
                    </div>
                @endif--}}
                <div class="card-body">
                    {{ Form::open([ 'url' => 'reuniones', 'method' => 'POST', 'action' => route('reuniones.store')]) }}
                    @csrf
                    <div class="form-group">
                        {!! Form::label('categoria_id', 'CATEGORIAS') !!}
                        {!! Form::select('categoria_id', $categorias, null, ['class' => 'form-control select-categoria', 'placeholder' => 'Seleccione una categoria...', 'id' => 'categorias']) !!}
                        {{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#categoria"><i
                                class="fas fa-calendar-check"></i>
                            Categoria
                        </button>--}}
                    </div>
                    <div class="form-group">
                        {!! Form::label('dia_reunion', 'DIA REUNION') !!} {!! Form::date('dia_reunion', $reunion->dia_reunion, ['class' => 'form-control'.($errors->has('dia_reunion') ? ' is-invalid' : ''), 'autofocus']) !!}
                        @if ($errors->has('dia_reunion'))
                            <span class="invalid-feedback">
                                    <strong>{{ $errors->first('dia_reunion') }}</strong>
                                </span>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col form-group">
                            {!! Form::label('inicio_reunion', 'DESDE') !!} {!! Form::time('inicio_reunion', $reunion->inicio_reunion, ['class' => 'form-control'.($errors->has('inicio_reunion') ? ' is-invalid' : '')]) !!}
                            @if ($errors->has('inicio_reunion'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('inicio_reunion') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="col form-group">
                            {!! Form::label('fin_reunion', 'HASTA') !!} {!! Form::time('fin_reunion', $reunion->fin_reunion, ['class' => 'form-control'.($errors->has('fin_reunion') ? ' is-invalid' : '')]) !!}
                            @if ($errors->has('fin_reunion'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('fin_reunion') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <section>
                        <div class="row">
                            <div class="col form-group">
                                {{ Form::label('name', 'ASISTENTES') }}
                                {!! Form::select('users[]', $users, null, ['users' => 'id', 'class' => 'form-control select-users', 'multiple' => 'multiple']) !!}
                            </div>
                        </div>
                    </section>
                    <div class="form-group">
                        {!! Form::label('titulo_reunion', 'TEMA') !!} {!! Form::text('titulo_reunion', $reunion->titulo_reunion, ['class' => 'form-control'.($errors->has('titulo_reunion') ? ' is-invalid' : ''), 'placeholder' => 'Tema Reunión']) !!}
                        @if ($errors->has('titulo_reunion'))
                            <span class="invalid-feedback">
                                    <strong>{{ $errors->first('titulo_reunion') }}</strong>
                                </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!! Form::label('cuerpo_reunion', 'ACTA DE REUNION') !!} {!! Form::textarea('cuerpo_reunion', $reunion->cuerpo_reunion, ['class' => 'form-control', 'id' => 'cuerpo'.($errors->has('cuerpo_reunion') ? ' is-invalid' : ''), 'placeholder' => 'Acta Reunión', 'rows' => "2"]) !!}
                        @if ($errors->has('cuerpo_reunion'))
                            <span class="invalid-feedback">
                                    <strong>{{ $errors->first('cuerpo_reunion') }}</strong>
                                </span>
                        @endif
                    </div>
                    {{--<div class="form-group">
                        @include('acuerdo.create')
                    </div>--}}
                    <div class="form-group">
                        {!! Form::label('observaciones_reunion', 'OBSERVACIONES') !!} {!! Form::textarea('observaciones_reunion', $reunion->observaciones_reunion, ['class' => 'form-control obs_reunion', 'placeholder' => 'Ingrese observaciones', 'rows' => "2"]) !!}
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            {{ Form::submit('Guardar', ['class' => 'btn btn-primary btn-lg btn-block']) }}
                        </div>
                        <div class="col">
                            <a href="{{ url('reuniones') }}">
                                {{ Form::button('Cancelar', ['class' => 'btn btn-secondary btn-lg btn-block'] ) }}
                            </a>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('plugins.Trumbowyg', true)
@section('js')
    <script>
        $('#cuerpo').trumbowyg({
            lang: 'es'
        });
        $('.select-users').select2(
            {
                placeholder: "Seleccione participantes",
                width: "100%"
            }
        );
        $("#categorias").select2({
            placeholder: "Seleccione una categoria",
            width: "100%"
        });
    </script>
@endsection
