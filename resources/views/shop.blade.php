@extends('layouts.app')

@section('title', 'Shop')

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

        @foreach ($productos->chunk(4) as $items)
            <div class="row">
                @foreach ($items as $producto)
                    <div class="col-md-3">
                        <div class="thumbnail">
                            <div class="caption text-center">
                                <a href="{{ url('producto', [$producto->id]) }}"><img
                                            src="{!! Storage::url(str_replace('.jpeg', '_small.jpeg', $producto->imagen)) !!}"
                                            alt="producto" class="img-responsive"></a>
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