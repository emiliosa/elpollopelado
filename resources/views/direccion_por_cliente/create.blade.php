@extends('layouts.app')

@section('title', 'Agregar dirección')

@section('content')
    <script src="{{ asset('/js/funciones.js') }}"></script>
    <div class="container">
        <div class="row">
            <div class="panel-heading">
                <a href="{{ route('direccion.index') }}" title="Volver">
                    <button class="btn btn-warning btn-xs">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Volver
                    </button>
                </a>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Dirección
                    </div>
                    <div class="panel-body">
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['route' => 'direccion_por_cliente.store']) !!}

                        @include ('direccion_por_cliente.form', ['submitButtonText' => 'Agregar'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection