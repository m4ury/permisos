@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center py-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>Informacion Funcionario</h5>
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-8">
                            Nombre: {{ strtoupper(Auth::user()->name) }} {{ strtoupper(Auth::user()->apellido_paterno) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            Rut: {{ Auth::user()->rut }}
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-8">
                                Calidad Contr.: {{ Auth::user()->contrato }}
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h5>Permisos</h5></div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <a class="btn btn-outline-primary" href="{{ route('permisos.index') }}" role="button">Cometidos</a>
                    <a class="btn btn-outline-success" href="{{ route('salidas.index') }}" role="button">Permiso Salida Especial</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection