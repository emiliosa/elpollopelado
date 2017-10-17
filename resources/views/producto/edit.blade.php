@extends('layouts.app')

@section('title', 'Actualizar producto')

@section('content')



    <br/>
    <br/>
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif



    {!! Form::close() !!}


    <script type="text/javascript" src="{{ URL::asset('js/funciones.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/producto.js') }}"></script>

    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ route('producto.index') }}" title="Volver">
                            <button class="btn btn-warning btn-xs">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Volver
                            </button>
                        </a>
                    </div>
                    <div class="panel-body">
                        <br />
                        <br />
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($producto, [
                            'method' => 'PATCH',
                            'url' => ['/producto', $producto->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('producto.form', ['submitButtonText' => 'Actualizar'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection