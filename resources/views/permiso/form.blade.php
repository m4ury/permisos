{{ Form::open([ 'url' => $url, 'method' => $method, 'action' => $action,]) }}

@csrf

{!! Form::hidden('user_id', Auth::user()->id) !!}

<div class="row">
<div class="col form-group">
    {!! Form::label('dia_inicio', 'Dia inicio') !!} {!! Form::date('dia_inicio', $permiso->dia_inicio, ['class' => 'form-control'.($errors->has('dia_inicio') ? ' is-invalid' : '')]) !!}
    @if ($errors->has('dia_inicio'))
        <span class="invalid-feedback">
        <strong>{{ $errors->first('dia_inicio') }}</strong>
    </span>
    @endif
</div>
<div class="col form-group">
    {!! Form::label('dia_fin', 'Dia fin') !!} {!! Form::date('dia_fin', $permiso->dia_fin, ['class' => 'form-control'.($errors->has('dia_fin') ? ' is-invalid' : '')]) !!}
    @if ($errors->has('dia_fin'))
        <span class="invalid-feedback">
        <strong>{{ $errors->first('dia_fin') }}</strong>
    </span>
    @endif
</div>
</div>

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
    {!! Form::label('descripcion', 'Descripción de la actividad') !!} {!! Form::textarea('descripcion', $permiso->descripcion, ['class' => 'form-control'.($errors->has('descripcion') ? ' is-invalid' : ''), 'rows' => "2"]) !!}
    @if ($errors->has('descripcion'))
    <span class="invalid-feedback">
        <strong>{{ $errors->first('descripcion') }}</strong>
    </span>
    @endif
</div>

<div class="row">
    <div class="col form-group">
        {!! Form::label('organizador', 'Organizador') !!} {!! Form::text('organizador', $permiso->organizador, ['class' => 'form-control', 'placeholder' => 'Quien Organiza']) !!}
    </div>

    <div class="col form-group">
        {!! Form::label('dcto_info', 'Doc Info') !!} {!! Form::select('doc_informacion', ['Correo' => 'correo', 'Telefono' => 'telefono', 'Web' => 'web'], $permiso->doc_informacion, ['class' => 'form-control', 'placeholder' => 'Documento informacion']) !!}
    </div>
</div>

<div class="row">
    <div class="col form-group">
        {!! Form::label('lugar', 'Lugar') !!} {!! Form::text('lugar', $permiso->lugar, ['class' => 'form-control', 'placeholder' => 'lugar de realización']) !!}
    </div>

    <div class="col form-group">
        {!! Form::label('comuna', 'Comuna') !!} {!! Form::select('comuna', ['Talca' => 'Talca', 'Curico' => 'Curico', 'Constitucion' => 'Constitucion', 'Curepto' => 'Curepto', 'Licanten' => 'Licanten', 'Hualañe' => 'Hualañe' ], $permiso->comuna, ['class' => 'form-control', 'placeholder' => 'Comuna']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('movilizacion', 'Movilizacion') !!} {!! Form::select('movilizacion', ['Vehiculo Servicio' => 'Vehiculo del Servicio', 'Bus' => 'Bus', 'Vehiculo Particular' => 'Vehiculo Particular' ], $permiso->movilizacion, ['class' => 'form-control', 'placeholder' => 'Se moviliza en ...']) !!}
</div>

<hr>
<div class="row text-center">
<div class="col form-group btn btn-outline-success mx-3">
    {!! Form::label('viatico', 'Viatico', ['class' => '' ]) !!} {!! Form::checkbox('incluye_viatico', 1, $permiso->incluye_viatico, ['class' => 'form-control']) !!}
</div>
<div class="col form-group btn btn-outline-primary mx-3">
    {!! Form::label('es_capacitacion', 'Capacitación', ['class' => '' ]) !!} {!! Form::checkbox('es_capacitacion', 1, $permiso->es_capacitacion, ['class' => 'form-control']) !!}
</div>
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