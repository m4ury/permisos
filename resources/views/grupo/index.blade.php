@extends('layouts.app')
@section('content')
    @foreach( $grupos as $grupo)
    {{ $grupo->grp_nombre }}
        @foreach($grupo->usuarios as $usuarios)
        {{ $usuarios->name.''.$usuarios->apellido_paterno }}
            @endforeach
    @endforeach
    @stop
