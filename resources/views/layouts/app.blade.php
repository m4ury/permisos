<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} | {{ request()->route()->getName() }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('plugins/chosen/chosen.jquery.js') }}"></script>
    <script src="{{ asset('plugins/fontawesome/js/all.js') }}"></script>
    <script src="{{ asset('plugins/trumbowyg/dist/trumbowyg.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('plugins/chosen/chosen.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/fontawesome/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/trumbowyg/dist/ui/trumbowyg.css') }}" rel="stylesheet">

</head>

<body>
@section('nav')
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" role="navigation">

            @if (session()->has('flash'))
                <div class="alert alert-info">{{ session('flash') }}</div>
            @endif
            <a class="navbar-brand" href="{{ url('/home') }}">
                {{ config('app.name') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar nav">
                    @if(auth()->check())
                        <li class="nav-item {{ request()->is('reuniones') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('reuniones.index') }}">Reuniones</a>
                        </li>

                        <li class="nav-item {{ request()->is('permisos') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('permisos.index') }}">Cometidos</a>
                        </li>
                        <li class="nav-item {{ request()->is('salidas') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('salidas.index') }}">Salidas</a>
                        </li>
                        <li class="nav-item {{ request()->is('categorias') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('categorias.index') }}">Categorias</a>
                        </li>

                    @endif
                    {{--{{ request()->path() }}--}}
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            @if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>

        @show

        <main class="py-4">
            @yield('content')
        </main>
        @yield('js')
    </div>
</body>
</html>