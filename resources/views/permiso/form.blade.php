{{ Form::open([ 'url' => $url, 'method' => $method, 'action' => $action]) }}

@csrf

<div class="form-group">
    {!! Form::label('rut', 'Rut') !!} {!! Form::text('rut', $paciente->rut, ['class' => 'form-control', 'placeholder' => 'Ingrese Rut', 'autofocus']) !!}
</div>
<div class="form-group">
    {!! Form::label('nombres', 'Nombres') !!} {!! Form::text('nombres', $paciente->nombres, ['class' => 'form-control', 'placeholder' => 'Ingrese Nombres']) !!}
</div>
<div class="form-group">
    {!! Form::label('apellidos', 'Apellidos') !!} {!! Form::text('apellidos', $paciente->apellidos, ['class' => 'form-control', 'placeholder' => 'Ingrese Apellidos']) !!}
</div>
<div class="form-group">
    {!! Form::label('direccion', 'Direccion') !!} {!! Form::text('direccion', $paciente->direccion, ['class' => 'form-control', 'placeholder' => 'Ingrese Direccion']) !!}
</div>
<div class="form-group">
    {!! Form::label('telefono', 'Telefono') !!} {!! Form::text('telefono', $paciente->telefono, ['class' => 'form-control', 'placeholder' => 'Ingrese Telefono']) !!}
</div>
<div class="form-group">
    {!! Form::label('sector', 'Sector') !!} {!! Form::select('sector', ['Celeste' => 'Celeste', 'Naranjo' => 'Naranjo', 'Blanco' => 'Blanco' ], $paciente->sector, ['class' => 'form-control', 'placeholder' => 'Seleccione Sector']) !!}
</div>
<div class="form-group">
    {!! Form::label('sexo', 'Sexo') !!} {!! Form::select('sexo', ['Masculino' => 'Masculino', 'Femenino' => 'Femenino', 'Homosexual' => 'Homosexual' ], $paciente->sexo, ['class' => 'form-control', 'placeholder' => 'Indique sexualidad']) !!}
</div>
<div class="form-group">
    {!! Form::label('edad', 'Edad') !!} {!! Form::number('edad', $paciente->edad, ['class' => 'form-control', 'placeholder' => 'Ingrese edad']) !!}
</div>
<div class="form-group">
    {!! Form::label('fecha_nacimiento', 'Fecha nacimiento') !!} {!! Form::date('fecha_nacimiento', $paciente->fecha_nacimiento, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
</div>
{{ Form::close() }}