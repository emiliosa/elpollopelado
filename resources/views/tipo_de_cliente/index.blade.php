@extends('layouts.app')

@section('title', 'Tipos de Cliente')

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{ route('tipo_de_cliente.create') }}" class="btn btn-success btn-sm" title="Agregar nuevo Tipo de Cliente">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Agregar
                    </a>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover text-nowrap" id="tableTipoDeCliente">
                            <thead>
                            <tr>
                                <th class="text-center">Descripción</th>
                                <th class="text-center">Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tipos_de_cliente as $tipo_de_cliente)
                                <tr>
                                    <td class="text-center">{{ $tipo_de_cliente->descripcion}}</td>
                                    <td class="text-center">
                                        <a href="{{ route('tipo_de_cliente.show', $tipo_de_cliente->id) }}" title="Ver Tipo de Cliente">
                                            <button class="btn btn-info btn-xs">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                        <a href="{{ route('tipo_de_cliente.edit', $tipo_de_cliente->id) }}" title="Editar Tipo de Cliente">
                                            <button class="btn btn-primary btn-xs">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                        <a href="{{ route('tipo_de_cliente.destroy', $tipo_de_cliente->id) }}" class="lnk-borrar" title="Eliminar tipo de cliente">
                                            <button class="btn btn-danger btn-xs">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include ('partials.modal.delete', ['modal_label' => 'Borrar tipo de cliente', 'modal_body_p' => '¿Desea eliminar el tipo de cliente seleccionado?'])
    </div>
@endsection
