@extends('layouts.app')

@push('javascript')
    <script type="text/javascript" src="{{ URL::asset('js/app/funciones.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/producto/create.js') }}"></script>
@endpush

@section('title', 'Actualizar producto')
@section('content')

    <div class="container">

        {!! Form::model($producto, ['method' => 'PATCH', 'url' => ['/producto', $producto->id], 'name' => 'producto_form', 'class' => 'form-horizontal']) !!}

            <div class="panel-heading"></div>

            <div class="col-xs-12 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Datos producto
                    </div>
                    <div class="panel-body">
                        @include ('producto.form')
                    </div>
                </div>
            </div>

            @include ('producto.actions')

        {!! Form::close() !!}

    </div>

@endsection
