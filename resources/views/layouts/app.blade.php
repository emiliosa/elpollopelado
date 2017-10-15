<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

    <!-- Jquery -->
    <script type="text/javascript" src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery-ui.min.js')}}"></script>

    <!-- Datepicker -->
    <script type="text/javascript" src="{{asset('js/datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/datepicker/bootstrap-datepicker.es.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.datepicker').datepicker({
                format: "dd-mm-yyyy",
                language: "es",
                autoclose: true
            });
        });
    </script>

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <!-- Bootstrap -->
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>



</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/categoria') }}">Categorias</a></li>
                    <li><a href="{{ url('/descuento') }}">Descuentos</a></li>
                    <li><a href="{{ url('/localidad') }}">Localidades</a></li>
                    <li><a href="{{ url('/moneda') }}">Monedas</a></li>
                    <li><a href="{{ url('/provincia') }}">Provincias</a></li>
                    <li><a href="{{ url('/partido') }}">Partidos</a></li>
                    <li><a href="{{ url('/tipo_de_identificacion') }}">Tipos de identificación</a></li>
                    <li><a href="{{ url('/tipo_de_cliente') }}">Tipos de cliente</a></li>
                    <li><a href="{{ url('/producto') }}">Productos</a></li>
                    <li><a href="{{ url('/unidad_de_venta') }}">Unidades de Venta</a></li>
                    <li><a href="{{ url('/cliente') }}">Clientes</a></li>
                    <li><a href="{{ url('/direccion') }}">Direcciones</a></li>
                    <li><a href="{{ url('/descuento_por_cliente') }}">Descuentos por cliente</a></li>
                    <li><a href="{{ url('/pedido') }}">Pedidos</a></li>
                </ul>

                <!-- Right Side Of Navbar 
                <ul class="nav navbar-nav navbar-right">
                     Authentication Links 
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>-->
            </div>
        </div>
    </nav>

    @yield('content')
</div>
</body>
</html>
