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
                        <div class="col-6">
                            Nombre: {{ ucfirst($usuario->name) }} {{ ucfirst($usuario->apellido_paterno) }}
                        </div>
                        <div class="col-6">
                            Rut: {{ $usuario->rut }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            Calidad Contr.: {{ $usuario->contrato }}
                        </div>
                        <div class="col-6">
                            Cargo: {{ $usuario->cargo->nombre }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            Unidad: {{ $usuario->unidad->nombre }}
                        </div>
                        <div class="col">
                            Grado: {{ $usuario->grado }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="row justify-content-center pb-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>DashBoard</h5>
                </div>
                <div class="card-body">
                    <span class="btn btn-primary">
                        Cometidos <span class="badge badge-light">4</span>
                    </span>
                    <span class="btn btn-success">
                        Capacitaciones <span class="badge badge-light">4</span>
                    </span>
                    <span class="btn btn-secondary">
                        Viaticos <span class="badge badge-light">4</span>
                    </span>
                    <hr>
                    <span class="btn btn-dark">
                        Salidas <span class="badge badge-light">4</span>
                    </span>
                    <span class="btn btn-warning">
                        <span class="badge badge-light"> Total ocupado: 30</span>
                    </span>
                </div>
            </div>
        </div>
    </div> -->

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>Permisos</h5>
                </div>

                <div class="card-body d-flex justify-content-around">
                    {{--@if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                </div>
                @endif--}}
                <a class="btn btn-outline-primary" href="{{ route('permisos.index') }}" role="button">Cometidos</a> 
                <a class="btn btn-outline-secondary" href="{{ route('reuniones.index') }}" role="button">Reuniones</a>
                <a class="btn btn-outline-success" href="{{ route('salidas.index') }}" role="button">P. Salida Especial</a>
            </div>
        </div>
    </div>
</div>
</div>
@endsection