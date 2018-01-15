@extends('layouts.app')

@push('javascript')
    <script src="{{ asset('/js/app/funciones.js') }}"></script>
@endpush

@section('title', 'Actualizar Direccion')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ route('direccion.index') }}" title="Volver">
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

                        {!! Form::model($direccion, [
                            'method' => 'PATCH',
                            'url' => ['/direccion', $direccion->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('direccion.form', ['submitButtonText' => 'Actualizar'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection