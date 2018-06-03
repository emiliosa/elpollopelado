@extends('layouts.app')

@section('title', 'Pedidos')

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

        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{ route('pedido.create') }}" class="btn btn-success btn-sm" title="Agregar nuevo pedido">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Agregar
                    </a>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover text-nowrap" id="tablePedidos">
                            <thead>
                            <tr>
                                <th class="text-center">Fecha envío</th>
                                <th class="text-left">Cliente</th>
                                <th class="text-left">Productos</th>
                                <th class="text-center">Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pedidos as $pedido)
                                <tr>
                                    <td class="text-center">{{ $pedido->fecha_envio }}</td>
                                    <td class="text-left">{{ $pedido->cliente->razon_social }}</td>
                                    <td class="text-left">
                                        @foreach ($pedido->unidadesVenta as $unidadVenta)
                                            <li>{{ '(' . $unidadVenta->pivot->cantidad . ') ' . $unidadVenta->productoPrecio->producto->categoria->descripcion . ' - ' . $unidadVenta->productoPrecio->producto->descripcion }}</li>
                                        @endforeach
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('pedido.show', $pedido->id) }}" title="Ver pedido">
                                            <button class="btn btn-info btn-xs">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                        {{--<a href="{{ route('pedido.edit', $pedido->id) }}" title="Editar pedido">
                                            <button class="btn btn-primary btn-xs">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </button>
                                        </a>--}}
                                        <a href="{{ route('pedido.destroy', $pedido->id) }}" class="lnk-borrar" title="Eliminar pedido">
                                            <button class="btn btn-danger btn-xs">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination">{{ $pedidos->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
        @include ('partials.modal.delete', ['modal_label' => 'Borrar pedido', 'modal_body_p' => '¿Desea eliminar el pedido seleccionado?'])
    </div>
@endsection
