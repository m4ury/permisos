@extends('adminlte::page')
@section('title', 'nuevo-cometido')
@section('content')
    <div class="row justify-content-left">
        <div class="col-sx-8 col-sm-8 col">
            <div class="card card-info card-outline">
                <div class="card-header"><i class="fas fa-business-time"></i> Nuevo Cometido</div>
                    @if(session()->has('info'))
                        <div class="alert alert-success">{{ session('info') }}</div>
                    @elseif(session()->has('danger'))
                        <div id="alert" class="alert alert-danger text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>{{ session('danger') }}</strong>
                        </div>
                    @endif
                    <div class="card-body">
                        @include('permiso.form', [ 'url' => 'permisos', 'method' => 'POST', 'action' => route('permisos.store')])
                    </div>
                </div>
            </div>
        </div>
@endsection