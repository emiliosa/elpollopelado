@extends('layouts.app')

@section('title', 'Clientes')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ route('cliente.index') }}" title="Back">
                            <button class="btn btn-warning btn-xs">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Volver
                            </button>
                        </a>
                        <a href="{{ route('cliente.edit', $cliente->id) }}" title="Editar cliente">
                            <button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                Editar
                            </button>
                        </a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'route' => ['cliente.destroy', $cliente->id],
                            'style' => 'display:inline'
                            ]) !!}
                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-xs',
                            'title' => 'Eliminar cliente',
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
                                    <th>Tipo Identificacion</th><td>{{ $cliente->tipoIdentificacion->descripcion }}</td>
                                </tr>
                                <tr>
                                    <th>Identificacion</th><td>{{ $cliente->identificacion }}</td>
                                </tr>
                                <tr>
                                    <th>Tipo Cliente</th><td>{{ $cliente->tipoCliente->descripcion }}</td>
                                </tr>
                                <tr>
                                    <th>Razon Social</th><td>{{ $cliente->razon_social }}</td>
                                </tr>
                                <tr>
                                    <th>Nombre</th><td>{{ $cliente->nombre }}</td>
                                </tr>
                                <tr>
                                    <th>Apellido</th><td>{{ $cliente->apellido }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th><td>{{ $cliente->email }}</td>
                                </tr>
                                <tr>
                                    <th>Telefono Celular</th><td>{{ $cliente->telefono_celular }}</td>
                                </tr>
                                <tr>
                                    <th>Telefono Fijo</th><td>{{ $cliente->telefono_fijo }}</td>
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