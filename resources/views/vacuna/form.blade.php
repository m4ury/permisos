{{ Form::open(['action' => 'VacunaController@store', 'method' => 'POST', 'class' => 'form-horizontal']) }}

<div class="form-group row">
    {!! Form::label('fecha_vacuna', 'Vacunación.', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-5">
        {!! Form::date('vacuna_fecha',null, ['class' => 'form-control form-control-sm']) !!}
    </div>
</div>
<hr>

<div class="form-group row">
    {!! Form::label('paciente_rut', 'Rut.', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-6">
        {!! Form::text('paciente_rut', null, ['class' => 'form-control form-control-sm'.($errors->has('paciente_rut') ? ' is-invalid' : ''), 'placeholder' =>
        '00000000-X']) !!}
        @if ($errors->has('paciente_rut'))
            <span class="invalid-feedback">
               <strong>{{ $errors->first('paciente_rut') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    {!! Form::label('paciente_nombres', 'Nombres', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('paciente_nombres', null, ['class' => 'form-control form-control-sm'.($errors->has('paciente_nombres') ? ' is-invalid' : ''),
    'placeholder' => 'Ingrese Nombres']) !!}
        @if ($errors->has('paciente_nombres'))
            <span class="invalid-feedback">
                          <strong>{{ $errors->first('paciente_nombres') }}</strong>
                        </span>
        @endif
    </div>
</div>

<div class="form-group row">
    {!! Form::label('apellidos', 'Apellidos', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-5">
        {!! Form::text('apellido_paterno',null, ['class' => 'form-control form-control-sm'.($errors->has('apellido_paterno') ? '
        is-invalid' : ''), 'placeholder' => 'Apellido Paterno']) !!}
        @if ($errors->has('apellido_paterno'))
            <span class="invalid-feedback">
                          <strong>{{ $errors->first('apellido_paterno') }}</strong>
                        </span>
        @endif
    </div>
    <div class="col-sm-5">
        {!! Form::text('apellido_materno',null, ['class' => 'form-control form-control-sm'.($errors->has('apellido_materno') ? '
        is-invalid' : ''), 'placeholder' => 'Apellido Materno']) !!}
        @if ($errors->has('apellido_materno'))
            <span class="invalid-feedback">
                          <strong>{{ $errors->first('apellido_materno') }}</strong>
                        </span>
        @endif
    </div>
</div>

<div class="form-group row">
    {!! Form::label('fecha_nacimiento', 'Fecha Nac.', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-5">
        {!! Form::date('fecha_nacimiento',null, ['class' => 'form-control form-control-sm']) !!}
    </div>
    <div class="col-sm-5">
        {!! Form::select('paciente_sexo', ['Femenino' => 'Femenino', 'Masculino' => 'Masculino', 'Otro' => 'otro'], null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione Sexo']) !!}
    </div>
</div>
<hr>
<div class="form-group row">
    {!! Form::label('tipo', 'Tipo Obj.', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
        {!! Form::select('tipo_id', $tipos->pluck('tipo_nombre', 'id'), null, ['class' => 'form-control form-control-sm select-tipo', 'placeholder' => 'Seleccione tipo']) !!}
    </div>
</div>
<hr>
<div class="row">
    <div class="col">
        {{ Form::submit('Guardar', ['class' => 'btn btn-primary btn-sm btn-block']) }}
    </div>
    <div class="col">
        <a href="{{ url('vacunas') }}" style="text-decoration:none">
            {{ Form::button('Cancelar', ['class' => 'btn btn-secondary btn-sm btn-block'] ) }}
        </a>
    </div>
</div>
{{ Form::close() }}
