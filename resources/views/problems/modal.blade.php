<div class="modal fade" id="problem" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nuevo Problema reloj </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('problems.store') }}" method="POST">
                    @csrf
                    {!! Form::hidden('user_id', Auth::user()->id) !!}
                    <div class="row">
                        <div class="col form-group">
                            {!! Form::label('fecha_problema_label', 'Fecha') !!} {!! Form::date('fecha_problema', $problem->fecha_problema, ['class' => 'form-control'.($errors->has('fecha_problema') ? ' is-invalid' : '')]) !!}
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
                        {!! Form::label('comentario_problema_label', 'Descripcion de Problema') !!} {!! Form::textarea('comentario_problema', $problem->comentario_problema, ['class' => 'form-control'.($errors->has('comentario_problema') ? ' is-invalid' : ''), 'placeholder' => 'Relate brevemente el episodio...']) !!}
                        @if ($errors->has('comentario_problema'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('comentario_problema') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-block">Guardar Categoria
                        </button>
                        <a href="{{ route('categorias.index') }}" class="btn btn-secondary btn-block">Volver</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>