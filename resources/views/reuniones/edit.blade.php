@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Editando Reunión</div>
                    @if(session()->has('info'))
                        <div class="alert alert-success">{{ session('info') }}</div>
                    @elseif(session()->has('danger'))
                        <div id="alert" class="alert alert-danger text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>{{ session('danger') }}</strong>
                        </div>
                    @endif
                    <div class="card-body">
                        {{ Form::open([ 'url' => 'reuniones/'.$reunion->id, 'method' => 'POST', 'action' => route('reuniones.update', $reunion->id)]) }}
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            {!! Form::label('categoria_id', 'Categorias') !!}
                            {!! Form::select('categoria_id', $categorias, $reunion->categoria()->pluck('id', 'nombre_categoria'), ['class' => 'form-control select-categoria']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('dia_reunion', 'Dia reunion') !!} {!! Form::date('dia_reunion', $reunion->dia_reunion,['class' => 'form-control'.($errors->has('dia_reunion') ? ' is-invalid' : '')]) !!}
                        </div>

                        <div class="row">
                            <div class="col form-group">
                                {!! Form::label('inicio_reunion', 'Desde') !!} {!! Form::time('inicio_reunion', $reunion->inicio_reunion, ['class' => 'form-control'.($errors->has('inicio_reunion') ? ' is-invalid' : '')]) !!}
                                @if ($errors->has('inicio_reunion'))
                                    <span class="invalid-feedback">
        <strong>{{ $errors->first('inicio_reunion') }}</strong>
    </span>
                                @endif
                            </div>
                            <div class="col form-group">
                                {!! Form::label('fin_reunion', 'Hasta') !!} {!! Form::time('fin_reunion', $reunion->fin_reunion, ['class' => 'form-control'.($errors->has('fin_reunion') ? ' is-invalid' : '')]) !!}
                                @if ($errors->has('fin_reunion'))
                                    <span class="invalid-feedback">
            <strong>{{ $errors->first('fin_reunion') }}</strong>
        </span>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <section>
                            <h5>Asistentes</h5>
                            <div class="row">
                                <div class="col form-group">
                                    {{ Form::label('name', 'Rut') }}
                                    {!! Form::select('user_id[]', $usuarios, $reunion->users()->pluck('user_id', 'name'), [ 'user_id' => 'id', 'class' => 'form-control select-users', 'multiple']) !!}
                                </div>
                            </div>
                        </section>

                        <div class="form-group">
                            {!! Form::label('titulo_reunion', 'Titulo') !!} {!! Form::text('titulo_reunion', $reunion->titulo_reunion, ['class' => 'form-control'.($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Titulo Reunión']) !!}
                        </div>


                        <div class="form-group">
                            {!! Form::label('cuerpo_reunion', 'Descripción de la reunión') !!} {!! Form::textarea('cuerpo_reunion', $reunion->cuerpo_reunion, ['class' => 'form-control cuerpo_reunion'.($errors->has('cuerpo_reunion') ? ' is-invalid' : ''), 'placeholder' => 'Acta Reunión', 'rows' => "2"]) !!}
                            @if ($errors->has('cuerpo_reunion'))
                                <span class="invalid-feedback">
        <strong>{{ $errors->first('cuerpo_reunion') }}</strong>
    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('observaciones_reunion', 'Observaciones') !!} {!! Form::textarea('observaciones_reunion', $reunion->observaciones_reunion, ['class' => 'form-control obs_reunion'.($errors->has('observaciones_reunion') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese observaciones', 'rows' => "2"]) !!}
                            @if ($errors->has('observaciones_reunion'))
                                <span class="invalid-feedback">
        <strong>{{ $errors->first('observaciones_reunion') }}</strong>
    </span>
                            @endif
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
    </div>
@endsection
@section('js')
    <script>
        $(".select-users").chosen({
            placeholder_text_multiple: "Seleccione Participantes",
            no_results_text: "Oops, se encontraron resultados!",
        });
        $(".select-categoria").chosen({
            placeholder_text_single: "Seleccione una categoria",
            no_results_text: "Oops, se encontraron resultados!",
        });
        $('.cuerpo_reunion').trumbowyg();
    </script>
@endsection
