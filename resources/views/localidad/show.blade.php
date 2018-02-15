@extends('layouts.app')

@section('title', 'Localidades')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ URL::previous() }}" title="Volver">
                            <button class="btn btn-warning btn-xs">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Volver
                            </button>
                        </a>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr><th>Provincia</th><td>{{ $localidad->partido->provincia->nombre }}</td></tr>
                                    <tr><th>Partido</th><td>{{ $localidad->partido->nombre }}</td></tr>
                                    <tr><th>Localidad</th><td>{{ $localidad->nombre }}</td></tr>
                                    <tr><th>Código postal</th><td>{{ $localidad->codigo_postal }}</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection