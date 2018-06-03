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
                <h3>{{ $producto->moneda->simbolo . $producto->productoPrecio->first()->getPrecioUnitarioFormatted() }}</h3>
                <form action="{{ url('/cart') }}" method="POST" class="side-by-side">
                    {!! csrf_field() !!}
                    <input type="hidden" name="id" value="{{ $producto->productoPrecio->first()->id }}">
                    <p>Stock disponible: {{ $producto->stock }}</p>
                    <input type="submit" class="btn btn-success btn-lg" value="Agregar al pedido">
                </form>

            </div> <!-- end col-md-8 -->
        </div> <!-- end row -->

        <div class="spacer"></div>

    </div> <!-- end container -->

@endsection
