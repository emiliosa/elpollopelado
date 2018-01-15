@extends('layouts.app')

@push('javascript')
    <script type="text/javascript" src="{{ URL::asset('js/direccion/direccion.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/descuento/descuento.js') }}"></script>
@endpush

@section('title', 'Actualizar Cliente')
@section('content')
    
    <div class="container">
        <div class="row">
            <div class="panel-heading">
                <a href="{{ route('cliente.index') }}" title="Volver">
                    <button class="btn btn-warning btn-xs">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Volver
                    </button>
                </a>
            </div>

            <div class="col-xs-12 col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Datos personales
                    </div>
                    <div class="panel-body">
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                            {!! Form::model($cliente, [
                                'method' => 'PATCH',
                                'url' => ['/cliente', $cliente->id]
                            ]) !!}

                            @include ('cliente.form', ['submitButtonText' => 'Actualizar'])

                            {!! Form::close() !!}

                    </div>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <button class="btn btn-success btn-sm" id="btn_agregar_descuento" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i>Agregar</button>
                    </div>
                    <div class="panel-body">

                        @include ('cliente.descuento_modal')
                        @include ('cliente.descuento_list')

                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <button class="btn btn-success btn-sm" id="btn_agregar_direccion" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i>Agregar</button>
                    </div>
                    <div class="panel-body">

                        @include ('cliente.direccion_modal')
                        @include ('cliente.direccion_list')
                        @include ('cliente.confirmacion_modal')

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection