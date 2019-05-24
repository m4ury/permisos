{{ Form::open([ 'url' => $url, 'method' => $method, 'action' => $action,]) }}

@csrf

{!! Form::hidden('user_id', Auth::user()->id) !!}

{{--<div class="form-group">
    {!! Form::label('tipo', 'Tipo de permiso') !!} {!! Form::select('tipo', ['Cometido' => 'Cometido', 'Salida' => 'Salida'], $salida->tipo, ['class' => 'form-control'.($errors->has('tipo') ? ' is-invalid' : ''), 'placeholder' => 'Indique tipo de
    permiso ']) !!}
    @if ($errors->has('tipo'))
    <span class="invalid-feedback">
        <strong>{{ $errors->first('tipo') }}</strong>
    </span>
    @endif
</div>--}}
<div class="form-group">
    {!! Form::label('hora_salida', 'Hora Salida') !!} {!! Form::time('hora_salida', $salida->hora_salida, ['class' => 'form-control'.($errors->has('hora_salida') ? ' is-invalid' : '')]) !!}
    @if ($errors->has('hora_salida'))
    <span class="invalid-feedback">
        <strong>{{ $errors->first('hora_salida') }}</strong>
    </span>
    @endif
</div>
<div class="form-group">
    {!! Form::label('hora_llegada', 'Desde') !!} {!! Form::time('hora_llegada', $salida->hora_llegada, ['class' => 'form-control'.($errors->has('hora_llegada') ? ' is-invalid' : '')]) !!}
    @if ($errors->has('hora_llegada'))
    <span class="invalid-feedback">
        <strong>{{ $errors->first('hora_llegada') }}</strong>
    </span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('dia_salida', 'Fecha de Permiso') !!} {!! Form::date('dia_salida', $salida->dia_salida, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('descripcion', 'Motivo') !!} {!! Form::textarea('descripcion', $salida->descripcion, ['class' => 'form-control'.($errors->has('descripcion') ? ' is-invalid' : '')]) !!}
    @if ($errors->has('descripcion'))
    <span class="invalid-feedback">
        <strong>{{ $errors->first('descripcion') }}</strong>
    </span>
    @endif
</div>

<div class="row">
    <div class="col">
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
    </div>
    <div class="col">
        <a href="{{ url('salidas') }}">
            {{ Form::button('Cancelar', ['class' => 'btn btn-secondary btn-lg btn-block'] ) }}
        </a>
    </div>
</div>
{{ Form::close() }}