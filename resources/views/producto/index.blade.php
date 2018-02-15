@extends('layouts.app')

@section('title', 'Productos')

@section('content')

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

        <div class="panel panel-default">

            <div class="panel-heading">
                <a href="{{ route('producto.create') }}" class="btn btn-success btn-sm" title="Agregar nuevo producto">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    Agregar
                </a>
            </div>

            <div class="panel-body">
                <div class="table-responsive" style="overflow-x: hidden;">

                    @foreach ($productos->chunk(4) as $items)
                        <div class="row">
                            @foreach ($items as $producto)
                                <div class="col-md-3">
                                    <div class="thumbnail">
                                        <div class="caption text-center">
                                            <a href="{{ url('producto', [$producto->id]) }}">
                                                <img src="{{ Storage::disk('public')->url(str_replace('.jpeg', '_small.jpeg', $producto->imagen)) }}" alt="producto" class="img-responsive">
                                                {{-- <img src="{{ asset('storage'/ . str_replace('.jpeg', '_small.jpeg', $producto->imagen)) }}" alt="producto" class="img-responsive">--}}
                                            </a>
                                            <a href="{{ url('producto', [$producto->id]) }}">
                                                <h3>{{ $producto->categoria->descripcion . ' ' . $producto->descripcion }}</h3>
                                                <p>{{ $producto->moneda->simbolo . $producto->precio_unitario }}</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach

                    <div class="text-center">
                        <div class="pagination">{{ $productos->links() }}</div>
                    </div>

                </div>
            </div>

        </div>

    </div>

@endsection