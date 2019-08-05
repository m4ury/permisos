{{ Form::open(['route' => $route, 'method' => $method]) }}
@csrf

<div class="col form-group">
    {!! Form::label('pasajes', 'Valor Pasajes') !!} {!! Form::number('pasajes', $viatico->pasajes, ['class' => 'form-control', 'placeholder' => 'valor pasajes']) !!}
</div>

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