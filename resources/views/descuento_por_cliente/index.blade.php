@extends('layouts.app')

@section('title', 'Descuentos por cliente')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ route('descuento_por_cliente.create') }}" class="btn btn-success btn-sm" title="Agregar nuevo descuento">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            Agregar
                        </a>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="tableDescuentos">
                                <thead>
                                <tr>
                                    <th class="text-center">Cliente</th>
                                    <th class="text-center">Descuento</th>
                                    <th class="text-center">Acción</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($descuentos_por_cliente as $descuento_por_cliente)
                                    <tr>
                                        <td class="text-center">{{ $descuento_por_cliente->cliente->razon_social}}</td>
                                        <td class="text-center">% {{ $descuento_por_cliente->descuento->porcentaje}}</td>
                                        <td class="text-center">
                                            <a href="{{ route('descuento_por_cliente.show', $descuento_por_cliente->id) }}" title="Ver descuento">
                                                <button class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    Ver
                                                </button>
                                            </a>
                                            <a href="{{ route('descuento_por_cliente.edit', $descuento_por_cliente->id) }}" title="Editar descuento">
                                                <button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    Editar
                                                </button>
                                            </a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'route' => ['descuento_por_cliente.destroy', $descuento_por_cliente->id],
                                                'style' => 'display:inline'
                                                ]) !!}
                                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Borrar', array(
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-xs',
                                                'title' => 'Eliminar descuento',
                                                'onclick'=>'return confirm("Confirmar eliminación?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination">{{ $descuentos_por_cliente->links() }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection