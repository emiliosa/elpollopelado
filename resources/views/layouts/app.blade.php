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
    <link rel="stylesheet" href="{{ URL::asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('js/jquery/datepicker/css/bootstrap-datepicker3.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('js/jquery/datepicker/css/bootstrap-datepicker3.css.map') }}">
    
    <!-- App -->
    {{--<script src="{{ asset('js/app/app.js') }}"></script>
    <script src="{{ asset('js/app/app2.js') }}"></script>--}}

    <!-- Jquery -->
    <script type="text/javascript" src="{{ URL::asset('js/jquery/jquery-3.2.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery/bootstrap/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery/bootstrap/bootstrap-table.min.js') }}"></script>

    <!-- Bootstrap -->
    {{-- <script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script> --}}

    <!-- Datepicker -->
    <script type="text/javascript" src="{{ URL::asset('js/jquery/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery/datepicker/locales/bootstrap-datepicker.es.min.js') }}"></script>

    <!-- Custom JS -->
    <script type="text/javascript" src="{{ URL::asset('js/app/funciones.js') }}"></script>

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
            $('.datepicker').datepicker({
                format: "dd/mm/yyyy",
                weekStart: 01,
                startDate: "now",
                todayBtn: "linked",
                language: "es",
                orientation: "bottom left",
                daysOfWeekHighlighted: "0,6",
                autoclose: true,
                todayHighlight: true
            });
            $('.loading').hide();
            
        });
    </script>

    @stack('styles')
    @stack('javascript')

</head>
<body>

    <div id="app">

      
        @include('partials.nav')
        
        <div class="container">
            @include('partials.form-status')
            @include('partials.status')
        </div>

        @yield('flash')

        @yield('content')

        <div class="footer">
            <div class="footer-inner">
                Versión POLLO 1.0
            </div>
        </div>

    </div>

    <div class="loading"></div>

</body>
</html>
