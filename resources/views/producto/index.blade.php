@extends('layouts.app')

@section('title', 'Productos')

@section('content')

    <!--
    <link rel="stylesheet" href="{{asset('css/bootstrap-table.min.css')}}">
    <script type="text/javascript" src="{{ URL::asset('js/bootstrap-table.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/producto.js') }}"></script>
    <div class="container">
        <div class="row">
            <div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ route('producto.create') }}" class="btn btn-success btn-sm"
                           title="Agregar nuevo producto">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            Agregar
                        </a>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="tableProductos">
                                <thead>
                                <tr>
                                    <th data-field='id' class="hidden">Id</th>
                                    <th data-field='codigo' class="text-center">Código</th>
                                    <th data-field='imagen' class="text-center">Imagen</th>
                                    <th data-field='categoria' class="text-center">Categoría</th>
                                    <th data-field='descripcion' class="text-center">Descripción</th>
                                    <th data-field='moneda.simbolo' class="text-center">Moneda</th>
                                    <th data-field='precio_unitario' class="text-center">Precio unitario</th>
                                    <th data-field='stock' class="text-center">Stock</th>
                                    <th class="text-center">Acción</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($productos as $producto)
                                    <tr>
                                        <td class="text-center">{{ $producto->codigo }}</td>
                                        <td class="text-center">
                                            @if ($producto->imagen)
                                                <img src="{{ Storage::url(str_replace('.jpeg', '_small.jpeg', $producto->imagen)) }}"/>
                                            @endif
                                        </td>
                                        <td class="text-center">{{ $producto->categoria->descripcion }}</td>
                                        <td class="text-center">{{ $producto->descripcion }}</td>
                                        <td class="text-center">{{ $producto->moneda->denominacion }}</td>
                                        <td class="text-center">{{ $producto->precio_unitario }}</td>
                                        <td class="text-center">{{ $producto->stock }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('producto.show', $producto->id) }}"
                                               title="Agregar al carrito">
                                                <button class="btn btn-info btn-xs"><i class="fa fa-shopping-cart"
                                                                                       aria-hidden="true"></i>
                                                    Agregar
                                                </button>
                                            </a>
                                            {!! Form::open([
                                                'method'=>'POST',
                                                'route' => [url('/cart'), $producto->id],
                                                'style' => 'display:inline'
                                                ]) !!}
                                            {!! Form::button('<i class="fa fa-shopping-cart" aria-hidden="true"></i> Agregar', array(
                                                'type' => 'submit',
                                                'class' => 'btn btn-info btn-xs',
                                                'title' => 'Agregar al carrito'
                                                )) !!}
                                            {!! Form::close() !!}
                                            <a href="{{ route('producto.edit', $producto->id) }}"
                                               title="Editar producto">
                                                <button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o"
                                                                                          aria-hidden="true"></i>
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
    -->

    <div class="container">

        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if (session()->has('error_message'))
            <div class="alert alert-danger">
                {{ session()->get('error_message') }}
            </div>
        @endif

        @foreach ($productos->chunk(4) as $items)
            <div class="row">
                @foreach ($items as $producto)
                    <div class="col-md-3">
                        <div class="thumbnail">
                            <div class="caption text-center">
                                <a href="{{ url('producto', [$producto->id]) }}">
                                    <img src="{!! Storage::url(str_replace('.jpeg', '_small.jpeg', $producto->imagen)) !!}" alt="producto" class="img-responsive">
                                </a>
                                <a href="{{ url('producto', [$producto->id]) }}">
                                    <h3>{{ $producto->categoria->descripcion . ' ' . $producto->descripcion }}</h3>
                                    <p>{{ $producto->moneda->simbolo . $producto->precio_unitario }}</p>
                                </a>
                            </div> <!-- end caption -->
                        </div> <!-- end thumbnail -->
                    </div> <!-- end col-md-3 -->
                @endforeach
            </div> <!-- end row -->
        @endforeach

    </div> <!-- end container -->

@endsection