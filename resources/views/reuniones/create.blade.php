@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Nueva Reunión</div>
                    @if(session()->has('info'))
                        <div class="alert alert-success">{{ session('info') }}</div>
                    @elseif(session()->has('danger'))
                        <div id="alert" class="alert alert-danger text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>{{ session('danger') }}</strong>
                        </div>
                    @endif
                    <div class="card-body">
                        @include('reuniones.form', [ 'url' => 'reuniones', 'method' => 'POST', 'action' => route('reuniones.store')])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection