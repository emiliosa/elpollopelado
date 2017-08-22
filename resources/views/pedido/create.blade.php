@extends('layouts.app')

@section('title', 'Agregar pedido')

@section('content')
    <script type="text/javascript" src="{{ URL::asset('js/pedido.js') }}"></script>
    <div class="container">
        <div class="row">
            <div class="panel-heading">
                <a href="{{ route('pedido.index') }}" title="Volver">
                    <button class="btn btn-warning btn-xs">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Volver
                    </button>
                </a>
            </div>
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    Datos pedido
                </div>
                <div class="panel-body">
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    {!! Form::open(['route' => 'pedido.store']) !!}

                    @include ('pedido.form', ['submitButtonText' => 'Agregar'])

                    {!! Form::close() !!}

                    @include ('pedido.cart')

                </div>
            </div>
            
        </div>
    </div>
@endsection