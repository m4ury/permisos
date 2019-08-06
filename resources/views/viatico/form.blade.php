
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editando Viatico Nº {{ $permiso->viatico->id }}</h4>
            </div>
            <div class="modal-body">
                {{ Form::open(['route' => [ 'viaticos.update', $permiso->viatico->id ], 'method' => 'PATCH']) }}
                @csrf

                <div class="col form-group">
                    {!! Form::label('pasajes', 'Valor Pasajes') !!} {!! Form::number('pasajes', $permiso->viatico->pasajes, ['class' => 'form-control', 'placeholder' => 'valor pasajes']) !!}
                </div>

                <div class="row">
                    <div class="col">
                        {!! Form::submit('Guardar', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
                    </div>
                    <div class="col">
                            {!! Form::button('Cancelar', ['class' => 'btn btn-secondary btn-lg btn-block', 'data-dismiss' => 'modal']) !!}
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>