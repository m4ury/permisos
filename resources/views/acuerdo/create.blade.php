<form action="{{ route('acuerdos.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col form-group">
            <input type="text" name="titulo_acuerdo"
                   class="form-control"
                   placeholder="Titulo acuerdo"
                   autofocus>
        </div>
        <div class="col form-group">
            <input type="text" name="descripcion_acuerdo"
                   class="form-control"
                   placeholder="Descripción del acuerdo">
        </div>
        <div class="col form-group">
            <button type="submit" class="btn btn-success btn-block">Guardar</button>
        </div>
    </div>
</form>
