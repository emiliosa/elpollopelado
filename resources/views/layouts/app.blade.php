<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ URL::asset('images/elpollopelado-logo.ico') }}" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-theme.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-table.min.css')}}">

    <!-- Datepicker -->
    {{--<link rel="stylesheet" href="{{ URL::asset('plugins/datepicker/css/bootstrap-datepicker3.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('plugins/datepicker/css/bootstrap-datepicker3.min.css.map') }}">--}}

    <!-- Datetimepicker -->
    <link rel="stylesheet" href="{{ URL::asset('plugins/datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}">

    <!-- Selec2 -->
    <link rel="stylesheet" href="{{ URL::asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/select2-bootstrap.min.css') }}">

    <!-- Custom -->
    <link rel="stylesheet" href="{{ URL::asset('css/app2.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/styles.css') }}">

    <!-- Jquery -->
    <script type="text/javascript" src="{{ URL::asset('js/jquery/jquery-3.2.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery/jquery-ui.min.js') }}"></script>

    <!-- Bootstrap -->
    <script type="text/javascript" src="{{ URL::asset('js/jquery/bootstrap/collapse.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery/bootstrap/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery/bootstrap/bootstrap-table.min.js') }}"></script>

    <!-- Jquery validate -->
    <script type="text/javascript" src="{{ URL::asset('js/jquery/validate/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery/validate/messages_es_AR.js') }}"></script>

    <!-- Inputmask -->
    <script type="text/javascript" src="{{ URL::asset('js/jquery/inputmask/jquery.inputmask.bundle.min.js') }}"></script>

    <!-- Datepicker -->
    {{--<script type="text/javascript" src="{{ URL::asset('plugins/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('plugins/datepicker/locales/bootstrap-datepicker.es.min.js') }}"></script>--}}

    <!-- Datetimepicker -->
    <script type="text/javascript" src="{{ URL::asset('plugins/moment/min/moment-with-locales.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('plugins/datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
    
    <!-- Selec2 -->
    <script type="text/javascript" src="{{ URL::asset('plugins/select2/js/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('plugins/select2/js/i18n/es.js') }}"></script>

    <!-- Custom -->
    <script type="text/javascript" src="{{ URL::asset('js/app/config.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/app/funciones.js') }}"></script>

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    @stack('styles')
    @stack('javascript')

</head>
<body>

    <div id="app">


        @include('partials.nav')

        @include('partials.status')

        @yield('flash')

        @yield('content')

        <div class="footer">
            <div class="footer-inner">
                Versión POLLO 1.0
            </div>
        </div>

    </div>

    <div class="loading hidden"></div>

</body>
</html>
