@extends('layouts.app')

@section('title', 'Direcciones por cliente')

@section('content')
    <div class="container">
        <div class="row">
            <div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ route('direccion_por_cliente.create') }}" class="btn btn-success btn-sm" title="Agregar nueva dirección">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            Agregar
                        </a>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="tableDirecciones">
                                <thead>
                                <tr>
                                    <th class="text-center">Provincia</th>
                                    <th class="text-center">Partido</th>
                                    <th class="text-center">Localidad</th>
                                    <th class="text-center">Calle</th>
                                    <th class="text-center">Altura</th>
                                    <th class="text-center">Piso</th>
                                    <th class="text-center">Dpto.</th>
                                    <th class="text-center">Entrecalles</th>
                                    <th class="text-center">Acción</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($direcciones_por_cliente as $direccion_por_cliente)
                                    <tr>
                                        <td class="text-center">{{ $direccion_por_cliente->direccion->provincia->nombre }}</td>
                                        <td class="text-center">{{ $direccion_por_cliente->direccion->partido->nombre }}</td>
                                        <td class="text-center">{{ $direccion_por_cliente->direccion->localidad->nombre }}</td>
                                        <td class="text-center">{{ $direccion_por_cliente->calle }}</td>
                                        <td class="text-center">{{ $direccion_por_cliente->altura }}</td>
                                        <td class="text-center">{{ $direccion_por_cliente->piso }}</td>
                                        <td class="text-center">{{ $direccion_por_cliente->dpto }}</td>
                                        <td class="text-center">{{ $direccion_por_cliente->entrecalles }}</td>
                                        <td>
                                            <a href="{{ route('direccion_por_cliente.show', $direccion_por_cliente->id) }}" title="Ver direccion">
                                                <button class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    Ver
                                                </button>
                                            </a>
                                            <a href="{{ route('direccion_por_cliente.edit', $direccion_por_cliente->id) }}" title="Editar direccion">
                                                <button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    Editar
                                                </button>
                                            </a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'route' => ['direccion_por_cliente.destroy', $direccion_por_cliente->id],
                                                'style' => 'display:inline'
                                                ]) !!}
                                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Borrar', array(
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-xs',
                                                'title' => 'Eliminar direccion',
                                                'onclick'=>'return confirm("Confirmar eliminación?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination">{{ $direcciones_por_cliente->links() }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection