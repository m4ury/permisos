@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-left">
            <div class="col-sx-12 col-sm-12 col-lg-8">
                <div class="card card-default">
                    <div class="card-header">Datos del Paciente</div>
                    <div class="card-body">
                        @include('vacuna.form')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(".select-tipo").chosen({
            placeholder_text_single: "Seleccione un tipo objetivo",
            no_results_text: "Oops, se encontraron resultados!",
            width: "100%"
        });
    </script>
@stop