@extends('layouts.app')

@push('javascript')
    <script type="text/javascript" src="{{ URL::asset('js/cliente/create.js') }}"></script>
@endpush

@section('title', 'Agregar Cliente')

@section('content')
    <div class="container">

        {!! Form::open(['route' => 'cliente.store', 'name' => 'cliente_form']) !!}

            <div class="panel-heading"></div>

            <div class="col-xs-12 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Datos personales
                    </div>
                    <div class="panel-body">
                        @include ('cliente.form')
                    </div>
                </div>
            </div>

            @include ('partials.actions', ['routeIndex' => 'cliente.index'])

        {!! Form::close() !!}

    </div>
@endsection
