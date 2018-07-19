<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts 
    <script src="{{ asset('js/app.js') }}" defer></script>
    -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body> 
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                        @can('accesos.index')
                        <li class="nav-item {{ active('accesos') }}">
                            <a href="{{ route('accesos.index') }}" class="nav-link">Control de accesos</a>
                        </li>
                        @endcan
                        @can('agendas.index')
                        <li class="nav-item {{ active('agendas') }}">
                            <a href="{{ route('agendas.index') }}" class="nav-link">Agenda de reuniones</a>
                        </li>
                        @endcan
                        @can('empresas.index')
                        <li class="nav-item {{ active('empresas') }}">
                            <a href="{{ route('empresas.index') }}" class="nav-link">Empresas</a>
                        </li>
                        @endcan
                        @can('usuarios.index')
                        <li class="nav-item {{ active('usuarios') }}">
                            <a href="{{ route('usuarios.index') }}" class="nav-link">Usuarios</a>
                        </li>
                        @endcan
                        @can('roles.index') 
                        <li class="nav-item {{ active('roles') }}">
                            <a class="nav-link" href="{{ route('roles.index') }}">Roles</a>
                        </li>
                        @endcan        
                        @can('servicios.index') 
                        <li class="nav-item {{ active('servicios') }}">
                            <a class="nav-link" href="{{ route('servicios.index') }}">Servicios</a>
                        </li>
                        @endcan        
                        @can('modulos.index') 
                        <li class="nav-item {{ active('modulos') }}">
                            <a class="nav-link" href="{{ route('modulos.index') }}">Modulos</a>
                        </li>
                        @endcan       
                        @can('herramientas.index') 
                        <li class="nav-item {{ active('herramientas') }}">
                            <a class="nav-link" href="{{ route('herramientas.index') }}">Herramientas</a>
                        </li>
                        @endcan    
                        @if (!empty(Auth::user()->empresa->id))
                        <?php $empresa_id = Auth::user()->empresa->id; ?>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cliente.index' ) }}">Vista Cliente</a>
                        </li>                                    
                        @endif            
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
        @if(session('info'))
            <div class="container text-center my-3">
                <div class="alert alert-success">
                    {{ session('info') }}
                </div>
            </div>
        @endif
        
        @if(count($errors))
        <div class="container text-center">
            <div class="row">
                <div class="">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>                                    
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @endif        
            @yield('content')
        </main>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>
