@extends('layouts.app')

@push('javascript')
    <script type="text/javascript" src="{{ URL::asset('js/cliente/edit.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/direccion/direccion.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/descuento/descuento.js') }}"></script>
@endpush

@section('title', 'Actualizar Cliente')
@section('content')
    
    <div class="container">

        {{--{!! Form::model($cliente, ['method' => 'PATCH','url' => ['/cliente', $cliente->id]]) !!}--}}
        {!! Form::open(['url' => '/cliente/' . $cliente->id, 'method' => 'PATCH', 'name' => 'cliente_form'] ) !!}

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

                        @include ('cliente.descuento_modal')
                        @include ('cliente.descuento_list')
                        @include ('cliente.descuento_confirmacion_modal')

                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Direcciones
                    </div>
                    <div class="panel-body">

                        @include ('cliente.direccion_modal')
                        @include ('cliente.direccion_list')
                        @include ('cliente.direccion_confirmacion_modal')

                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12">
                <div class="form-actions">
                    <div class="pull-left">
                        <a href="{{ route('cliente.index') }}" title="Volver">
                            <input type="button" class="btn btn-default" value="Cancelar"/>
                        </a>
                    </div>
                    <div class="pull-right">
                        <a href="" title="Guardar">
                            <input type="button" class="btn btn-primary btn-submit-edit" value="Guardar"/>
                        </a>
                    </div>
                </div>
            </div>

        {!! Form::close() !!}
    </div>
@endsection