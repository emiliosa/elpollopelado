@extends('layouts.app')

@section('title', 'Agregar Cliente')

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

                    {!! Form::open(['route' => 'cliente.store']) !!}

                    @include ('cliente.form', ['submitButtonText' => 'Agregar'])

                    {!! Form::close() !!}

                </div>
            </div>

        </div>
    </div>
@endsection