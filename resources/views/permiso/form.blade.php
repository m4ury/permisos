{{ Form::open([ 'url' => $url, 'method' => $method, 'action' => $action]) }}

@csrf

<div class="form-group">
    {!! Form::label('rut', 'Rut') !!} {!! Form::text('rut', $user->rut, ['class' => 'form-control', 'placeholder' => 'Ingrese Rut', 'autofocus']) !!}
</div>
<div class="form-group">
    {!! Form::label('name', 'Nombres') !!} {!! Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Ingrese Nombres']) !!}
</div>
<div class="form-group">
    {!! Form::label('apellido_paterno', 'Apellido Paterno') !!} {!! Form::text('apellido_paterno', $user->apellido_paterno, ['class' => 'form-control', 'placeholder' => 'Ingrese Apellido Paterno']) !!}
</div>
<div class="form-group">
    {!! Form::label('apellido_materno', 'Apellido Materno') !!} {!! Form::text('apellido_materno', $user->apellido_materno, ['class' => 'form-control', 'placeholder' => 'Ingrese Apellido Materno']) !!}
</div>
<div class="form-group">
    {!! Form::label('cargo', 'Cargo') !!} {!! Form::text('cargo', $cargo->descripcion, ['class' => 'form-control', 'placeholder' => 'Ostenta al cargo de...']) !!}
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
    {!! Form::label('sexo', 'Sexo') !!} {!! Form::select('sexo', ['Masculino' => 'Masculino', 'Femenino' => 'Femenino', 'Homosexual' => 'Homosexual' ], $user->sexo, ['class' => 'form-control', 'placeholder' => 'Indique sexualidad']) !!}
</div>
<div class="form-group">
    {!! Form::label('edad', 'Edad') !!} {!! Form::number('edad', $user->edad, ['class' => 'form-control', 'placeholder' => 'Ingrese edad']) !!}
</div>
<div class="form-group">
    {!! Form::label('fecha_nacimiento', 'Fecha nacimiento') !!} {!! Form::date('fecha_nacimiento', $user->fecha_nacimiento, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
</div>
{{ Form::close() }}