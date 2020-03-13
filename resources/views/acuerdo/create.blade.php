<form id="form-acuerdo" method="POST">
    @csrf
    <div class="row">
        <div class="col-sm-4 form-group">
            <input type="text" name="titulo_acuerdo"
                   id="titulo_acuerdo"
                   class="form-control"
                   placeholder="Titulo acuerdo"
                   autofocus>
        </div>
        <div class="col-sm-6 form-group">
            <input type="text" name="descripcion_acuerdo"
                   id="descripcion_acuerdo"
                   class="form-control"
                   placeholder="Descripción del acuerdo">
        </div>
        <div class="col-sm-2 form-group">
            <button id="btn-guardar" type="submit" class="btn btn-success btn-group-sm">Guardar</button>
        </div>
    </div>
</form>
{{--
<script>
    $(document).ready(function () {
        $('#form-acuerdo').submit(function (event) {
            event.preventDefault();
            $.ajax({
                    type: 'POST',
                    url: "{{ route('acuerdos.store') }}",
                    data: {},
                    success: function (data) {
                        let html = '';
                        if (data.errors) {
                            html = '<div class="alert alert-danger">';
                            for (var count = 0; count < data.errors.length; count++) {
                                html += '<p>' + data.errors[count] + '</p>';
                            }
                            html += '</div>'
                        }
                        if (data.success) {
                            html = '<div class="alert alert-success">' + data.success + '</div>';
                            $('#form')[0].reset();
                            $('')
                        }
                    }
                }
            );
        })
    })
</script>--}}
