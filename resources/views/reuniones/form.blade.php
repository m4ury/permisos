{{ Form::open([ 'url' => $url, 'method' => $method, 'action' => $action,]) }}

@csrf
<div class="form-group">
    {!! Form::label('dia_reunion', 'Dia reunion') !!} {!! Form::date('dia_reunion', $reunion->dia_reunion, ['class' => 'form-control'.($errors->has('dia_reunion') ? ' is-invalid' : '')]) !!}
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
    <div class="form-group">
        {!! Form::label('titulo_reunion', 'Titulo') !!} {!! Form::text('titulo_reunion', $reunion->titulo_reunion, ['class' => 'form-control'.($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Titulo Reunión']) !!}
    </div>


<div class="form-group">
    {!! Form::label('cuerpo_reunion', 'Descripción de la reunión') !!} {!! Form::textarea('cuerpo_reunion', $reunion->cuerpo_reunion, ['class' => 'form-control'.($errors->has('cuerpo_reunion') ? ' is-invalid' : ''), 'placeholder' => 'Acta Reunión', 'rows' => "2"]) !!}
    @if ($errors->has('cuerpo_reunion'))
    <span class="invalid-feedback">
        <strong>{{ $errors->first('cuerpo_reunion') }}</strong>
    </span>
    @endif
</div>
<div class="form-group">
    {!! Form::label('observaciones_reunion', 'Observaciones') !!} {!! Form::textarea('observaciones_reunion', $reunion->observaciones_reunion, ['class' => 'form-control'.($errors->has('observaciones_reunion') ? ' is-invalid' : ''), 'rows' => "2"]) !!}
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