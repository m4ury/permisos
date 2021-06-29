@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('usuario.edit') }}">
        @csrf

        <div class="form-group row">
            <label for="rut" class="col-md-4 col-form-label text-md-right">{{ __('Rut') }}</label>

            <div class="col-md-6">
                <input id="rut" type="text" placeholder="16888999-k"
                       class="form-control{{ $errors->has('rut') ? ' is-invalid' : '' }}" name="rut"
                       value="{{ old('rut') }}" required>

                @if ($errors->has('rut'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('rut') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombres') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                       name="name" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="apellido_paterno"
                   class="col-md-4 col-form-label text-md-right">{{ __('Apellido Paterno') }}</label>

            <div class="col-md-6">
                <input id="apellido_paterno" type="text"
                       class="form-control{{ $errors->has('apellido_paterno') ? ' is-invalid' : '' }}"
                       name="apellido_paterno" value="{{ old('apellido_paterno') }}" required autofocus>

                @if ($errors->has('apellido_paterno'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('apellido_paterno') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="apellido_materno"
                   class="col-md-4 col-form-label text-md-right">{{ __('Apellido Materno') }}</label>

            <div class="col-md-6">
                <input id="apellido_materno" type="text"
                       class="form-control{{ $errors->has('apellido_materno') ? ' is-invalid' : '' }}"
                       name="apellido_materno" value="{{ old('apellido_materno') }}" required autofocus>

                @if ($errors->has('apellido_materno'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('apellido_materno') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" placeholder="loquesea@dominio.com"
                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                       value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" placeholder="minimo 6 caracteres"
                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm"
                   class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>
@endsection