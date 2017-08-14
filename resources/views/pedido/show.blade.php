@extends('layouts.app')

@section('title', 'Pedidos')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ route('pedido.index') }}" title="Back">
                            <button class="btn btn-warning btn-xs">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Volver
                            </button>
                        </a>
                        <a href="{{ route('pedido.edit', $pedido->id) }}" title="Editar pedido">
                            <button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                Editar
                            </button>
                        </a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'route' => ['pedido.destroy', $pedido->id],
                            'style' => 'display:inline'
                            ]) !!}
                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-xs',
                            'title' => 'Eliminar pedido',
                            'onclick'=>'return confirm("Confirmar eliminación?")'
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
                                    <th>Fecha</th>
                                    <td>{{ $pedido->fecha }}</td>
                                </tr>
                                <tr>
                                    <th>Cliente</th>
                                    <td>{{ $pedido->cliente->razon_social }}</td>
                                </tr>
                                <tr>
                                    <th>Descuento</th>
                                    <td>{{ $pedido->descuento->porcentaje }}</td>
                                </tr>
                                <tr>
                                    <th>Dirección envío</th>
                                    <td>{{ $pedido->direccionEnvio->id }}</td>
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