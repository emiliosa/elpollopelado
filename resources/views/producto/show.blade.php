@extends('layouts.app')

@section('title', 'Producto')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ route('producto.index') }}" title="Back">
                            <button class="btn btn-warning btn-xs">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Volver
                            </button>
                        </a>
                        <a href="{{ route('producto.edit', $producto->id) }}" title="Editar producto">
                            <button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o"
                                                                      aria-hidden="true"></i>
                                Editar
                            </button>
                        </a>
                        {!! Form::open([
                            'method' => 'DELETE',
                            'route' => ['producto.destroy', $producto->id],
                            'style' => 'display:inline'
                            ]) !!}
                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-xs',
                            'title' => 'Eliminar producto',
                            'onclick' => 'return confirm("Confirmar eliminación?")'
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
                                    <th>Código</th>
                                    <td>{{ $producto->codigo }}</td>
                                </tr>
                                <tr>
                                    <th>Categoría</th>
                                    <td>{{ $producto->categoria->descripcion }}</td>
                                </tr>
                                <tr>
                                    <th>Descripción</th>
                                    <td>{{ $producto->descripcion }}</td>
                                </tr>
                                <tr>
                                    <th>Moneda</th>
                                    <td>{{ $producto->moneda->denominacion }}</td>
                                </tr>
                                <tr>
                                    <th>Precio unitario</th>
                                    <td>{{ $producto->precio_unitario }}</td>
                                </tr>
                                <tr>
                                    <th>Stock</th>
                                    <td>{{ $producto->stock }}</td>
                                </tr>
                                <tr>
                                    <th>Imagen</th>
                                    <td>@if ($producto->imagen)
                                            <img src="{{ Storage::url($producto->imagen) }}"/>
                                        @endif
                                    </td>
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