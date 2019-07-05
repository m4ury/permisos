{{ Form::open([ 'url' => $url, 'method' => $method, 'action' => $action,]) }}

@csrf

{!! Form::hidden('user_id', Auth::user()->id) !!}

<div class="form-group">
    {!! Form::label('dia_inicio', 'Dia') !!} {!! Form::date('dia_inicio', $permiso->dia_inicio, ['class' => 'form-control'.($errors->has('dia_inicio') ? ' is-invalid' : '')]) !!}
    @if ($errors->has('dia_inicio'))
        <span class="invalid-feedback">
        <strong>{{ $errors->first('dia_inicio') }}</strong>
    </span>
    @endif
</div>
{{--<div class="form-group">
    {!! Form::label('dia_fin', 'Dia fin') !!} {!! Form::date('dia_fin', $permiso->dia_fin, ['class' => 'form-control'.($errors->has('dia_fin') ? ' is-invalid' : '')]) !!}
    @if ($errors->has('dia_fin'))
        <span class="invalid-feedback">
        <strong>{{ $errors->first('dia_fin') }}</strong>
    </span>
    @endif
</div>--}}

<div class="row">
    <div class="col form-group">
    {!! Form::label('hora_inicio', 'Desde') !!} {!! Form::time('hora_inicio', $permiso->hora_inicio, ['class' => 'form-control'.($errors->has('hora_inicio') ? ' is-invalid' : '')]) !!}
    @if ($errors->has('hora_inicio'))
        <span class="invalid-feedback">
        <strong>{{ $errors->first('hora_inicio') }}</strong>
    </span>
    @endif
    </div>
    <div class="col form-group">
        {!! Form::label('hora_fin', 'Hasta') !!} {!! Form::time('hora_fin', $permiso->hora_fin, ['class' => 'form-control'.($errors->has('hora_fin') ? ' is-invalid' : '')]) !!}
        @if ($errors->has('hora_fin'))
            <span class="invalid-feedback">
            <strong>{{ $errors->first('hora_fin') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group">
    {!! Form::label('descripcion', 'Motivo') !!} {!! Form::textarea('descripcion', $permiso->descripcion, ['class' => 'form-control'.($errors->has('descripcion') ? ' is-invalid' : '')]) !!}
    @if ($errors->has('descripcion'))
    <span class="invalid-feedback">
        <strong>{{ $errors->first('descripcion') }}</strong>
    </span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('lugar', 'Lugar') !!} {!! Form::select('lugar', ['Talca' => 'Talca', 'Curico' => 'Curico', 'Constitucion' => 'Constitucion', 'Curepto' => 'Curepto', 'Licanten' => 'Licanten', 'Hualañe' => 'Hualañe' ], $permiso->lugar, ['class' => 'form-control', 'placeholder' => 'Indique lugar ']) !!}
</div>

<div class="form-group">
    {!! Form::label('movilizacion', 'Movilizacion') !!} {!! Form::select('movilizacion', ['Vehiculo Servicio' => 'Vehiculo del Servicio', 'Bus' => 'Bus', 'Vehiculo Particular' => 'Vehiculo Particular' ], $permiso->movilizacion, ['class' =>
    'form-control', 'placeholder' => 'Se moviliza en ...']) !!}
</div>

<hr>
<div class="form-group btn btn-outline-success btn-block">
    {!! Form::label('viatico', 'Viatico', ['class' => '' ]) !!} {!! Form::checkbox('viatico', 1, $permiso->viatico, ['class' => 'form-control']) !!}
</div>
<hr>

<div class="row">
    <div class="col">
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
    </div>
    <div class="col">
        <a href="{{ url('permisos') }}">
            {{ Form::button('Cancelar', ['class' => 'btn btn-secondary btn-lg btn-block'] ) }}
        </a>
    </div>
</div>
{{ Form::close() }}