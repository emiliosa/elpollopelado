@extends('layouts.app')

@section('title', 'Unidades de Venta')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ route('unidad_de_venta.create') }}" class="btn btn-success btn-sm" title="Agregar nueva unidad de venta">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            Agregar
                        </a>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="tableUnidadDeVenta">
                                <thead>
                                    <tr>
                                        <th class="text-center">Producto</th>
                                        <th class="text-center">Nro. de serie</th>
                                        <th class="text-center">Estado</th>
                                        <th class="text-center">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($unidades_de_venta as $unidad_de_venta)
                                    <tr>
                                        <td class="text-center">{{ $unidad_de_venta->producto->descripcion }}</td>
                                        <td class="text-center">{{ $unidad_de_venta->nro_serie }}</td>
                                        <td class="text-center">{{ $estados[$unidad_de_venta->estado] }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('unidad_de_venta.show', $unidad_de_venta->id) }}" title="Ver unidad">
                                                <button class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    Ver
                                                </button>
                                            </a>
                                            <a href="{{ route('unidad_de_venta.edit', $unidad_de_venta->id) }}" title="Editar unidad">
                                                <button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    Editar
                                                </button>
                                            </a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'route' => ['unidad_de_venta.destroy', $unidad_de_venta->id],
                                                'style' => 'display:inline'
                                                ]) !!}
                                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Borrar', array(
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-xs',
                                                'title' => 'Eliminar unidad',
                                                'onclick'=>'return confirm("Confirmar eliminación?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination">{{ $unidades_de_venta->links() }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection