@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Permisos</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                        <a class="btn btn-outline-primary" href="{{ route('permisos.index') }}" role="button">Mis Permisos</a>
                        <a class="btn btn-outline-success" href="{{ route('permisos.create') }}" role="button">Solicitar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection