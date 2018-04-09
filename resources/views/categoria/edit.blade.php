@extends('layouts.app')

@push('javascript')
    <script type="text/javascript" src="{{ URL::asset('js/categoria/create.js') }}"></script>
@endpush

@section('title', 'Actualizar Categoría')

@section('content')
    <div class="container">

        {!! Form::model($categoria, ['method' => 'PATCH', 'name' => 'categoria_form', 'url' => ['/categoria', $categoria->id]]) !!}

            <div class="col-xs-12 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Datos categoria
                    </div>
                    <div class="panel-body">
                        @include ('categoria.form')
                    </div>
                </div>
            </div>

            @include ('partials.actions', ['routeIndex' => 'categoria.index'])

        {!! Form::close() !!}

    </div>
@endsection
