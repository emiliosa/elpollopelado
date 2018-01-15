@extends('layouts.app')

@section('title', 'Clientes')

@section('content')

    <div class="container">
    
        <div class="row">
            <div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ route('cliente.create') }}" class="btn btn-success btn-sm" title="Agregar nuevo cliente">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            Agregar
                        </a>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="tableCliente">
                                <thead>
                                <tr>
                                    <th class="text-center">Tipo Identificacion</th>
                                    <th class="text-center">Identificacion</th>
                                    <th class="text-center">Tipo Cliente</th>
                                    <th class="text-center">Razon Social</th>
                                    <th class="text-center">Nombre.</th>
                                    <th class="text-center">Apellido</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Telefono Celular</th>
                                    <th class="text-center">Telefono Fijo</th>
                                    <th class="text-center">Acción</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($clientes as $cliente)
                                    <tr>
                                        <td class="text-center">{{ $cliente->tipoIdentificacion->descripcion }}</td>
                                        <td class="text-center">{{ $cliente->identificacion }}</td>
                                        <td class="text-center">{{ $cliente->tipoCliente->descripcion }}</td>
                                        <td class="text-center">{{ $cliente->razon_social }}</td>
                                        <td class="text-center">{{ $cliente->nombre }}</td>
                                        <td class="text-center">{{ $cliente->apellido }}</td>
                                        <td class="text-center">{{ $cliente->email }}</td>
                                        <td class="text-center">{{ $cliente->telefono_celular }}</td>
                                        <td class="text-center">{{ $cliente->telefono_fijo }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('cliente.show', $cliente->id) }}" title="Ver cliente">
                                                <button class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    Ver
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
                                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Borrar', array(
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-xs',
                                                'title' => 'Eliminar cliente',
                                                'onclick'=>'return confirm("Confirmar eliminación?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination">{{ $clientes->links() }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection