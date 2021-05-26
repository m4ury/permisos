{{ Form::open([ 'url' => $url, 'method' => $method, 'action' => $action,]) }}
@csrf
{!! Form::hidden('user_id', Auth::user()->id) !!}
<div class="row">
    <div class="col form-group">
        {!! Form::label('fecha_problema_label', 'Fecha') !!} {!! Form::date('fecha_problema', $problem->fecha_problema,
        ['class' => 'form-control'.($errors->has('fecha_problema') ? ' is-invalid' : '')]) !!}
        @if ($errors->has('fecha_problema'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('fecha_problema') }}</strong>
        </span>
        @endif
    </div>
</div>
<div class="form-group row my-2 ml-2">
    {!! Form::label('entrada_lavel', 'Entrada', ['class' => 'col-sm-3 col-form-label']) !!}
    <div class="col-sm">
        {!! Form::checkbox('entrada', 1, null, ['class' => 'form-control my-2 check1']) !!}
    </div>
    {!! Form::label('salida_lavel', 'Salida', ['class' => 'col-sm-3 col-form-label']) !!}
    <div class="col-sm-3">
        {!! Form::checkbox('salida', 1, null, ['class' => 'form-control my-2 check1']) !!}
    </div>
</div>

<div class="col form-group">
    {!! Form::label('comentario_problema_label', 'Descripcion de Problema') !!} {!!
    Form::textarea('comentario_problema', $problem->comentario_problema, ['class' =>
    'form-control'.($errors->has('comentario_problema') ? ' is-invalid' : ''), 'placeholder' => 'Relate brevemente el episodio...']) !!}
    @if ($errors->has('comentario_problema'))
    <span class="invalid-feedback">
        <strong>{{ $errors->first('comentario_problema') }}</strong>
    </span>
    @endif
</div>
<hr>
<div class="row">
    <div class="col">
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
    </div>
    <div class="col">
        <a href="{{ url('problems') }}">
            {{ Form::button('Cancelar', ['class' => 'btn btn-secondary btn-lg btn-block'] ) }}
        </a>
    </div>
</div>
{{ Form::close() }}
@section('js')
<script>
    $('.check1').on('change', function () {
            $('input.check1').not(this).prop('checked', false);
        });
        $('.check1').on('change', function () {
            $('input.check1').not(this).prop('checked', false);
        });
</script>
@endsection
