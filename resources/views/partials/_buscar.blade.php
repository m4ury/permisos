{!! Form::open(['route' => 'reuniones.index', 'method' => 'GET', 'class' => 'form-inline float-right']) !!}
<div class="form-group mx-1">
    {{ Form::text('titulo_reunion', null, ['class' => 'form-control', 'placeholder' => 'Titulo reunión']) }}
</div>
<div class="form-group mx-1">
    {{ Form::text('cuerpo_reunion', null, ['class' => 'form-control', 'placeholder' => 'Cuerpo reunión']) }}
</div>
<div class="form-group mx-1">
    {{ Form::date('dia_reunion', null, ['class' => 'form-control']) }}
</div>
<div class="form-group mx-1">
    <button type="submit" class="btn btn-secondary form-control"><span><i
                    class="material-icons">search</i></span></button>
</div>
{!! Form::close() !!}