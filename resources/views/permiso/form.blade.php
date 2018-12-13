
{{ Form::open([ 'url' => $url, 'method' => $method, 'action' => $action,]) }}

@csrf

{!! Form::hidden( 'user_id', Auth::user()->id) !!}

<div class="form-group">
    {!! Form::label('tipo', 'Tipo de permiso') !!} {!! Form::select('tipo', ['Cometido' => 'Cometido', 'Salida' => 'Salida'], $permiso->tipo, ['class' => 'form-control', 'placeholder' => 'Indique tipo de permiso ']) !!}
</div>
<div class="form-group">
    {!! Form::label('hora_inicio', 'Desde') !!} {!! Form::time('hora_inicio', $permiso->hora_inicio, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('hora_fin', 'Hasta') !!} {!! Form::time('hora_fin', $permiso->hora_fin, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('dia_inicio', 'Dia inicio') !!} {!! Form::date('dia_inicio', $permiso->dia_inicio, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('dia_fin', 'Dia fin') !!} {!! Form::date('dia_fin', $permiso->dia_fin, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('descripcion', 'Motivo') !!} {!! Form::textarea('descripcion', $permiso->descripcion, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('movilizacion', 'Movilizacion') !!} {!! Form::select('movilizacion', ['Vehiculo Servicio' => 'Vehiculo del Servicio', 'Bus' => 'Bus', 'Vehiculo Particular' => 'Vehiculo Particular' ], $permiso->movilizacion, ['class' => 'form-control', 'placeholder' => 'Se moviliza en ...']) !!}
</div>
<div class="form-group">
    {!! Form::label('lugar', 'Lugar') !!} {!! Form::select('lugar', ['Talca' => 'Talca', 'Curico' => 'Curico', 'Constitucion' => 'Constitucion' ], $permiso->lugar, ['class' => 'form-control', 'placeholder' => 'Indique lugar ']) !!}
</div>
<div class="form-group text-justify">
    {!! Form::label('viatico', 'Viatico') !!} {!! Form::checkbox('viatico', 'viatico', $permiso->viatico, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
</div>
{{ Form::close() }}