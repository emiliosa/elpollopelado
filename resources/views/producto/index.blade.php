@extends('layouts.app')

@section('title', 'Productos')

@section('content')

    <div class="container">
        <div class="row">
            <div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ route('producto.create') }}" class="btn btn-success btn-sm" title="Agregar nuevo producto">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            Agregar
                        </a>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="tableProductos">
                                <thead>
                                <tr>
                                    <th class="text-center">Código</th>
                                    <th class="text-center">Categoría</th>
                                    <th class="text-center">Descripción</th>
                                    <th class="text-center">Moneda</th>
                                    <th class="text-center">Precio unitario</th>
                                    <th class="text-center">Stock</th>
                                    <th class="text-center">Acción</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($productos as $producto)
                                    <tr>
                                        <td class="text-center">{{ $producto->codigo }}</td>
                                        <td class="text-center">{{ $producto->categoria->descripcion }}</td>
                                        <td class="text-center">{{ $producto->descripcion }}</td>
                                        <td class="text-center">{{ $producto->moneda->denominacion }}</td>
                                        <td class="text-center">{{ $producto->precio_unitario }}</td>
                                        <td class="text-center">{{ $producto->stock }}</td>
                                        <td class="text-center">{{ $producto->imagen }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('producto.show', $producto->id) }}" title="Ver producto">
                                                <button class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    Ver
                                                </button>
                                            </a>
                                            <a href="{{ route('producto.edit', $producto->id) }}" title="Editar producto">
                                                <button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    Editar
                                                </button>
                                            </a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'route' => ['producto.destroy', $producto->id],
                                                'style' => 'display:inline'
                                                ]) !!}
                                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Borrar', array(
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-xs',
                                                'title' => 'Eliminar producto',
                                                'onclick'=>'return confirm("Confirmar eliminación?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination">{{ $productos->links() }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection