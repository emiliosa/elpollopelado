@extends('layouts.app')

@section('title', 'Monedas')

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{ route('moneda.create') }}" class="btn btn-success btn-sm" title="Agregar nueva moneda">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Agregar
                    </a>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover text-nowrap" id="tableMoneda">
                            <thead>
                            <tr>
                                <th class="text-center">Denominación</th>
                                <th class="text-center">Código</th>
                                <th class="text-center">Símbolo</th>
                                <th class="text-center">Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($monedas as $moneda)
                                <tr>
                                    <td class="text-center">{{ $moneda->denominacion}}</td>
                                    <td class="text-center">{{ $moneda->codigo}}</td>
                                    <td class="text-center">{{ $moneda->simbolo}}</td>
                                    <td class="text-center">
                                        <a href="{{ route('moneda.show', $moneda->id) }}" title="Ver moneda">
                                            <button class="btn btn-info btn-xs">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                        <a href="{{ route('moneda.edit', $moneda->id) }}" title="Editar moneda">
                                            <button class="btn btn-primary btn-xs">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                        <a href="{{ route('moneda.destroy', $moneda->id) }}" class="lnk-borrar" title="Eliminar moneda">
                                            <button class="btn btn-danger btn-xs">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination">{{ $monedas->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
        @include ('partials.modal.delete', ['modal_label' => 'Borrar moneda', 'modal_body_p' => '¿Desea eliminar la moneda seleccionada?'])
    </div>
@endsection
