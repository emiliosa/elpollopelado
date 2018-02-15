@extends('layouts.app')

@section('title', 'Producto')

@section('content')

    <div class="container">
        <p><a href="{{ url('/producto') }}">Productos</a> / {{ $producto->descripcion }}</p>
        <h1>{{ $producto->categoria->descripcion . ' - ' . $producto->descripcion }}</h1>
        <a href="{{ route('producto.edit', $producto->id) }}"
           title="Editar producto">
            <button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o"
                                                      aria-hidden="true"></i>
                Editar
            </button>
        </a>

        <hr>

        <div class="row">
            <div class="col-md-4">
                @if ($producto->imagen)
                    <img src="{{ Storage::url($producto->imagen) }}" alt="Imágen no disponible" class="img-responsive">
                @endif
                <p><h3>{{ $producto->observaciones }}</h3></p>
            </div>

            <div class="col-md-8">
                <h3>{{ $producto->moneda->simbolo . $producto->precio_unitario }}</h3>
                <form action="{{ url('/cart') }}" method="POST" class="side-by-side">
                    {!! csrf_field() !!}
                    <input type="hidden" name="id" value="{{ $producto->id }}">
                    <input type="hidden" name="descripcion" value="{{ $producto->descripcion }}">
                    <input type="hidden" name="observaciones" value="{{ $producto->observaciones }}">
                    <input type="hidden" name="precio_unitario" value="{{ $producto->precio_unitario }}">
                    <p>Stock disponible: {{ $producto->stock }}</p>
                    <input type="submit" class="btn btn-success btn-lg" value="Agregar al pedido">
                </form>
                
            </div> <!-- end col-md-8 -->
        </div> <!-- end row -->

        <div class="spacer"></div>

    </div> <!-- end container -->










    <!--
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
-->
@endsection