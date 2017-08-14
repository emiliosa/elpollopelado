@extends('layouts.app')

@section('title', 'Agregar producto')

@section('content')
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

                        {!! Form::open(['route' => 'producto.store', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('producto.form', ['submitButtonText' => 'Agregar'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection