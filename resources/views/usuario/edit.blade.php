@extends('layouts.app')

@section('content')
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Mi Perfil</div>
                    @if(session()->has('info'))
                        <div class="alert alert-success">{{ session('info') }}</div>
                    @elseif(session()->has('danger'))
                        <div id="alert" class="alert alert-danger text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>{{ session('danger') }}</strong>
                        </div>
                    @endif
                    <div class="card-body">
                        {{--@include('viatico.form', ['viatico' => $viatico, 'route' => [ 'viatico.update', $viatico->id ], 'method' => 'PATCH']);--}}
                        @include('viatico.form', ['viatico' => $permiso->viatico, 'route' => [ 'viaticos.update', $permiso->viatico->id ], 'method' => 'PATCH'])
                    </div>
                </div>
            </div>
        </div>
@endsection