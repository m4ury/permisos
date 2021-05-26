{{ Form::open([ 'url' => $url, 'method' => $method, 'action' => $action,]) }}
@csrf
{!! Form::hidden('user_id', Auth::user()->id) !!}
<div class="row">
    <div class="col form-group">
        {!! Form::label('dia_inicio', 'Dia inicio') !!} {!! Form::date('dia_inicio', $permiso->dia_inicio, ['class' =>
        'form-control'.($errors->has('dia_inicio') ? ' is-invalid' : '')]) !!}
        @if ($errors->has('dia_inicio'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('dia_inicio') }}</strong>
        </span>
        @endif
    </div>
    <div class="col form-group">
        {!! Form::label('dia_fin', 'Dia fin') !!} {!! Form::date('dia_fin', $permiso->dia_fin, ['class' =>
        'form-control'.($errors->has('dia_fin') ? ' is-invalid' : '')]) !!}
        @if ($errors->has('dia_fin'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('dia_fin') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="row">
    <div class="col form-group">
        {!! Form::label('hora_inicio', 'Desde') !!} {!! Form::time('hora_inicio', $permiso->hora_inicio, ['class' =>
        'form-control'.($errors->has('hora_inicio') ? ' is-invalid' : '')]) !!}
        @if ($errors->has('hora_inicio'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('hora_inicio') }}</strong>
        </span>
        @endif
    </div>
    <div class="col form-group">
        {!! Form::label('hora_fin', 'Hasta') !!} {!! Form::time('hora_fin', $permiso->hora_fin, ['class' =>
        'form-control'.($errors->has('hora_fin') ? ' is-invalid' : '')]) !!}
        @if ($errors->has('hora_fin'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('hora_fin') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group">
    {!! Form::label('descripcion', 'Descripción de la actividad') !!} {!! Form::textarea('descripcion',
    $permiso->descripcion, ['class' => 'form-control'.($errors->has('descripcion') ? ' is-invalid' : ''), 'rows' =>
    "2"]) !!}
    @if ($errors->has('descripcion'))
    <span class="invalid-feedback">
        <strong>{{ $errors->first('descripcion') }}</strong>
    </span>
    @endif
</div>

<hr>
<div class="row text-center">
    <div class="col form-group btn btn-outline-success mx-3">
        {!! Form::label('viatico', 'Viatico', ['class' => '' ]) !!} {!! Form::checkbox('incluye_viatico', 1,
        $permiso->incluye_viatico, ['class' => 'form-control']) !!}
    </div>
    <div class="col form-group btn btn-outline-primary mx-3">
        {!! Form::label('es_capacitacion', 'Capacitación', ['class' => '' ]) !!} {!! Form::checkbox('es_capacitacion',
        1, $permiso->es_capacitacion, ['class' => 'form-control es_capacitacion']) !!}
    </div>
</div>
<hr>

<div class="row" id="capacitacion-fields">
    <div class="col form-group">
        {!! Form::label('organizador', 'Organizador') !!} {!! Form::text('organizador', $permiso->organizador, ['class'
        => 'form-control', 'placeholder' => 'Quien Organiza']) !!}
    </div>

    <div class="col form-group">
        {!! Form::label('dcto_info', 'Doc Info') !!} {!! Form::select('doc_informacion', ['Correo' => 'correo',
        'Telefono' => 'telefono', 'Web' => 'web'], $permiso->doc_informacion, ['class' => 'form-control', 'placeholder'
        => 'Documento informacion']) !!}
    </div>
</div>

<div class="row">
    <div class="col form-group">
        {!! Form::label('lugar', 'Lugar') !!} {!! Form::text('lugar', $permiso->lugar, ['class' => 'form-control',
        'placeholder' => 'lugar de realización']) !!}
    </div>

    <div class="col form-group">
        {!! Form::label('comuna', 'Comuna') !!} {!! Form::select('comuna', ['Talca' => 'Talca', 'Curico' => 'Curico',
        'Constitucion' => 'Constitucion', 'Curepto' => 'Curepto', 'Licanten' => 'Licanten', 'Hualañe' => 'Hualañe',
        'Santiago' => 'Santiago' ], $permiso->comuna, ['class' => 'form-control', 'id' => 'comuna', 'placeholder' =>
        'Seleccione Comuna']) !!}
    </div>
</div>


<div class="form-group row my-2 ml-2">
    {!! Form::label('movilizacion_lavel', 'Vehiculo Servicio', ['class' => 'col-sm-3 col-form-label']) !!}
    <div class="col-sm">
        {!! Form::checkbox('movilizacion', "servicio", null, ['class' => 'form-control my-2 check1']) !!}
    </div>
    {!! Form::label('movilizacion_lavel', 'Bus', ['class' => 'col-sm-3 col-form-label']) !!}
    <div class="col-sm-3">
        {!! Form::checkbox('movilizacion', "bus", null, ['class' => 'form-control my-2 check1']) !!}
    </div>
    {!! Form::label('movilizacion_lavel', 'Vehiculo particular', ['class' => 'col-sm-3 col-form-label']) !!}
    <div class="col-sm-3">
        {!! Form::checkbox('movilizacion', "particular", null, ['class' => 'form-control my-2 check1']) !!}
    </div>
</div>
<hr>
{{--<div class="form-group">
    {!! Form::label('movilizacion', 'Movilizacion') !!} {!! Form::checkbox('movilizacion', ['Vehiculo Servicio' => 'Vehiculo del Servicio', 'Bus' => 'Bus', 'Vehiculo Particular' => 'Vehiculo Particular' ], $permiso->movilizacion, ['class' => 'form-control', 'placeholder' => 'Se moviliza en ...']) !!}
</div>--}}

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
@section('js')
<script>
    $('#capacitacion-fields').hide();
        $('.es_capacitacion').click(function () {
            $('#capacitacion-fields').fadeIn()[this.checked ? "show" : "hide"]();
        });
</script>
<script>
    $('#comuna').select2({
            theme: "classic",
            width: '100%'
        });
</script>
<script>
    $('input.check1').on('change', function () {
            $('input.check1').not(this).prop('checked', false);
        });
</script>
@endsection
