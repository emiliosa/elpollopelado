@extends('layouts.app')

@section('title', 'Unidades de Venta')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ route('unidad_de_venta.index') }}" title="Back">
                            <button class="btn btn-warning btn-xs">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Volver
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
                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-xs',
                            'title' => 'Eliminar moneda',
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
                                    <th>Producto</th><td>{{ $unidad_de_venta->producto->descripcion }}</td>
                                </tr>
                                <tr>
                                    <th>Nro. de serie</th><td>{{ $unidad_de_venta->nro_serie }}</td>
                                </tr>
                                <tr>
                                    <th>Estado</th><td>{{ $estados[$unidad_de_venta->estado] }}</td>
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