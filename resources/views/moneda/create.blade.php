@extends('layouts.app')

@section('title', 'Agregar Moneda')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ route('moneda.index') }}" title="Volver">
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

                        {!! Form::open(['route' => 'moneda.store', 'class' => 'form-horizontal']) !!}

                        @include ('moneda.form', ['submitButtonText' => 'Agregar'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
