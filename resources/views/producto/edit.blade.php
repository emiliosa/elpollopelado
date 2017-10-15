@extends('layouts.app')

@section('title', 'Actualizar producto')

@section('content')

    <script type="text/javascript" src="{{ URL::asset('js/funciones.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/producto.js') }}"></script>


    <a href="{{ route('producto.index') }}" title="Volver">
        <button class="btn btn-warning btn-xs">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
            Volver
        </button>
    </a>

    <br/>
    <br/>
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


@endsection