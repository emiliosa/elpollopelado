@extends('layouts.app')

@push('javascript')
    <script type="text/javascript" src="{{ URL::asset('js/pedido/create.js') }}"></script>
@endpush

@section('title', 'Agregar pedido')
@section('content')
    <div class="container">

        {!! Form::open(['route' => 'pedido.store', 'name' => 'pedido_form']) !!}

            <div class="col-xs-12 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Datos pedido
                    </div>
                    <div class="panel-body">
                        @include ('pedido.form')
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Productos
                    </div>
                    <div class="panel-body">

                        @include ('pedido.cart')
                        @include ('pedido.producto.modal.confirm')

                    </div>
                </div>
            </div>

            @include ('pedido.actions')

        {!! Form::close() !!}

    </div>
@endsection
