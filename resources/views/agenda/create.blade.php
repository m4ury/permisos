@extends('adminlte::page')
@section('title', 'nuevo-problema')
@section('content')
    <div class="row justify-content-left">
        <div class="col-sx-8 col-sm-8 col">
            <div class="card card-info card-outline">
                <div class="card-header"><i class="fas fa-clock"></i> Problema reloj Biometrico</div>
                    <div class="card-body">
                        @include('problems.form', [ 'url' => 'problems', 'method' => 'POST', 'action' => route('problems.store')])
                    </div>
                </div>
            </div>
        </div>
@endsection