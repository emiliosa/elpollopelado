@extends('layouts.app')

@push('javascript')
    <script type="text/javascript" src="{{ URL::asset('js/categoria/create.js') }}"></script>
@endpush

@section('title', 'Agregar Categoría')

@section('content')
    <div class="container">

        {!! Form::open(['route' => 'categoria.store', 'name' => 'categoria_form']) !!}

            <div class="panel-heading"></div>

            <div class="col-xs-12 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Datos de categoria
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
