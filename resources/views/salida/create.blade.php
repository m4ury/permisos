@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Nueva Salida</div>
                    @if(session()->has('info'))
                        <div class="alert alert-success">{{ session('info') }}</div>
                    @endif
                    <div class="card-body">
                        @include('salida.form', [ 'url' => 'salidas', 'method' => 'POST', 'action' => route('salidas.store')])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection