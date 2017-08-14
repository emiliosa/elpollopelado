@extends('layouts.app')

@section('title', 'Direcciones')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ route('direccion.index') }}" title="Back">
                            <button class="btn btn-warning btn-xs">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Volver
                            </button>
                        </a>
                        <a href="{{ route('direccion.edit', $direccion->id) }}" title="Editar direccion">
                            <button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                Editar
                            </button>
                        </a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'route' => ['direccion.destroy', $direccion->id],
                            'style' => 'display:inline'
                            ]) !!}
                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-xs',
                            'title' => 'Eliminar direccion',
                            'onclick'=>'return confirm("Confirmar eliminación?")'
                            )) !!}
                        {!! Form::close() !!}
                    </div>
                    <div class="panel-body">
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                <tr>
                                    <th>Id</th><td>{{ $direccion->id }}</td>
                                </tr>
                                <tr>
                                    <th>Provincia</th><td>{{ $direccion->provincia->nombre }}</td>
                                </tr>
                                <tr>
                                    <th>Partido</th><td>{{ $direccion->partido->nombre }}</td>
                                </tr>
                                <tr>
                                    <th>Localidad</th><td>{{ $direccion->localidad->nombre }}</td>
                                </tr>
                                <tr>
                                    <th>Calle</th><td>{{ $direccion->calle }}</td>
                                </tr>
                                <tr>
                                    <th>Altura</th><td>{{ $direccion->altura }}</td>
                                </tr>
                                <tr>
                                    <th>Piso</th><td>{{ $direccion->piso }}</td>
                                </tr>
                                <tr>
                                    <th>Dpto.</th><td>{{ $direccion->dpto }}</td>
                                </tr>
                                <tr>
                                    <th>Entrecalles</th><td>{{ $direccion->entrecalles }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection