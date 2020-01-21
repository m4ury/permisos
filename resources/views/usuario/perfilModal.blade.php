<div class="modal fade perfilModal{{ auth()->id() }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edita tu perfil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('user.update', auth()->id()) }}">
                    @csrf
                    {{ method_field('PUT') }}


                    <div class="form-group row">
                        <label for="anexo"
                               class="col-md-4 col-form-label text-md-right">Anexo: </label>

                        <div class="col-md-6">
                            <input id="anexo" type="text" placeholder="Anexo Minsal"
                                   class="form-control{{ $errors->has('anexo') ? ' is-invalid' : '' }}" name="anexo"
                                   value="{{ old('anexo') }}">

                            @if ($errors->has('anexo'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('anexo') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="celular"
                               class="col-md-4 col-form-label text-md-right">Celular: </label>

                        <div class="col-md-6">
                            <input id="celular" type="text"
                                   class="form-control{{ $errors->has('celular') ? ' is-invalid' : '' }}" name="celular"
                                   value="{{ old('celular') }}">

                            @if ($errors->has('celular'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('celular') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Actualizar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>