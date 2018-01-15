<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-table.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/app2.css') }}">

    <!-- App -->
    <script src="{{ asset('js/app/app.js') }}"></script>
    <script src="{{ asset('js/app/app2.js') }}"></script>

    <!-- Jquery -->
    {{-- <script type="text/javascript" src="{{ URL::asset('js/jquery-3.2.1.js') }}"></script> --}}
    <script type="text/javascript" src="{{ URL::asset('js/jquery/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery/bootstrap/bootstrap-table.min.js') }}"></script>

    <!-- Bootstrap -->
    {{-- <script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script> --}}

    <!-- Datepicker -->
    <script type="text/javascript" src="{{ URL::asset('js/jquery/datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery/datepicker/bootstrap-datepicker.es.min.js') }}"></script>

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};

        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
        });
    </script>

    @stack('styles')
    @stack('javascript')

</head>
<body>




<div id="app">

  <!--  
  <nav class="navbar navbar-inverse navbar-static-top">
    <div class="container">
    <div class="navbar-header">
        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
            <span class="sr-only"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    
    <div class="collapse navbar-collapse js-navbar-collapse">
        <ul class="nav navbar-nav">

            <li class="dropdown mega-dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Clientes <span class="caret"></span></a>              
                <ul class="dropdown-menu mega-dropdown-menu">
                    <li class="col-sm-3">
                        <ul>
                            <li class="dropdown-header">Clientes</li>
                            <li><a href="{{ url('/cliente') }}">Ver</a></li>
                        </ul>
                    </li>
                    <li class="col-sm-3">
                        <ul>
                            <li class="dropdown-header">Direcciones</li>
                            <li><a href="{{ url('/direccion') }}">Ver</a></li>
                        </ul>
                    </li>
                    <li class="col-sm-3">
                        <ul>
                            <li class="dropdown-header">Descuentos</li>
                            <li><a href="{{ url('/descuento') }}">Ver</a></li>
                        </ul>
                    </li>
                </ul>               
            </li>

            <li class="dropdown mega-dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Productos <span class="caret"></span></a>                
                <ul class="dropdown-menu mega-dropdown-menu">
                    <li class="col-sm-3">
                        <ul>
                            <li class="dropdown-header">Listado</li>
                            <li><a href="#">Auto Carousel</a></li>
                            <li><a href="#">Carousel Control</a></li>
                            <li><a href="#">Left & Right Navigation</a></li>
                            <li><a href="#">Four Columns Grid</a></li>
                            <li class="divider"></li>
                            <li class="dropdown-header">Fonts</li>
                            <li><a href="#">Glyphicon</a></li>
                            <li><a href="#">Google Fonts</a></li>
                        </ul>
                    </li>
                    <li class="col-sm-3">
                        <ul>
                            <li class="dropdown-header">Plus</li>
                            <li><a href="#">Navbar Inverse</a></li>
                            <li><a href="#">Pull Right Elements</a></li>
                            <li><a href="#">Coloured Headers</a></li>                            
                            <li><a href="#">Primary Buttons & Default</a></li>                          
                        </ul>
                    </li>
                    <li class="col-sm-3">
                        <ul>
                            <li class="dropdown-header">Much more</li>
                            <li><a href="#">Easy to Customize</a></li>
                            <li><a href="#">Calls to action</a></li>
                            <li><a href="#">Custom Fonts</a></li>
                            <li><a href="#">Slide down on Hover</a></li>                         
                        </ul>
                    </li>
                </ul>               
            </li>

        </ul>
        <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">My account <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
        <li><a href="#">My cart (0) items</a></li>
      </ul>
    </div>
  </nav>
    -->

    @include('partials.nav')
    
    <div class="container">
        @include('partials.form-status')
    </div>

    @yield('content')

</div>





















</body>
</html>
