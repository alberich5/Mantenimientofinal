<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('Mantenimiento', 'Mantenimiento') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link  href="{{ asset('css/sweetalert.css') }}" rel="stylesheet">
    <link href="{{ asset('css/codigo.css') }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/1.png">
    @yield('css')

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <style media="screen">
    #welcome{
       background-image: url("img/prueba2.jpg");
      background-attachment: fixed;
      background-repeat: no-repeat;
      background-size:100% 100%;
    }
    </style>
</head>
<body id="welcome">
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top" id="navegacion">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('Servicios', 'Servicios') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                          <!--  <li><a href="{{ url('/posts') }}">Atenciones</a></li>-->
                            <li><a href="{{ url('/login') }}">Login</a></li>
                           <!-- <li><a href="{{ url('/register') }}">Register</a></li>-->
                            <li><a href="{{ url('/howto') }}">Como usar ?</a></li>
                        @else
                          <li><a href="{{ url('/posts') }}">Crear</a></li>

                            @if(Auth::user()->rol == 'user')
                              <li><a href="{{ url('/vista') }}">Mantenimientos</a></li>
                            @endif
                            @if(Auth::user()->rol == 'admin')
                              <li><a href="{{ url('/quejas') }}">Mantenimientos Totales</a></li>
                            @endif


                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Ver <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">

                                        <li><a href="{{ url('/articulos') }}">Articulos</a></li>
                                        <li><a href="{{ url('/mosclientes') }}">Clientes</a></li>
                                        <li><a href="{{ url('/cancelados') }}">Entradas Cancelados</a></li>
                                        <li><a href="{{ url('/mostrarsalidas') }}">Mostrar Salidas</a></li>
                                        <li><a href="{{ url('/especifico') }}">Bitacora</a></li>



                                </ul>
                            </li>


                          <!--  <li><a href="{{ url('/filtro') }}">Filtro</a></li>-->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                  <!--  <li><a href="{{ url('/home') }}">Inicio</a></li>-->
                                    @if(Auth::user()->rol == 'admin')
                                        <li><a href="{{ url('/users/manageprofiles') }}">Administrar</a></li>
                                        @endif
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Salir
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>

                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/vue.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/sweetalert.min.js') }}"></script>
    @yield('js')

</body>
</html>
