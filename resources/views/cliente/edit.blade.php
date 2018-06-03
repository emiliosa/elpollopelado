@extends('layouts.app')

@push('javascript')
    <script type="text/javascript" src="{{ URL::asset('js/cliente/edit.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/cliente/direccion.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/cliente/descuento.js') }}"></script>
@endpush

@section('title', 'Actualizar Cliente')
@section('content')

    <div class="container">

        {!! Form::open(['url' => '/cliente/' . $cliente->id, 'method' => 'PATCH', 'name' => 'cliente_form'] ) !!}

            <input id="cliente_id" name="cliente_id" type="hidden" value="{{ $cliente->id }}">

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

            <div class="col-xs-12 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Descuentos
                    </div>
                    <div class="panel-body">

                        @include ('cliente.descuento.list')
                        @include ('cliente.descuento.modal.form')
                        @include ('cliente.descuento.modal.delete')

                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Direcciones
                    </div>
                    <div class="panel-body">

                        @include ('cliente.direccion.list')
                        @include ('cliente.direccion.modal.form')
                        @include ('cliente.direccion.modal.delete')

                    </div>
                </div>
            </div>

            @include ('partials.actions', ['routeIndex' => 'cliente.index'])

        {!! Form::close() !!}
    </div>
@endsection
