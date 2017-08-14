@extends('layouts.app')

@section('title', 'Direcciones')

@section('content')
    <div class="container">
        <div class="row">
            <div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ route('direccion.create') }}" class="btn btn-success btn-sm" title="Agregar nueva dirección">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            Agregar
                        </a>
                    </div>
                    <div class="panel-body">
                        @include ('direccion.list')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection