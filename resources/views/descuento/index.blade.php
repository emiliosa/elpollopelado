@extends('layouts.app')

@section('title', 'Descuentos')

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{ route('descuento.create') }}" class="btn btn-success btn-sm" title="Agregar nuevo descuento">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Agregar
                    </a>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover text-nowrap" id="tableDescuento">
                            <thead>
                            <tr>
                                <th class="text-center">Porcentaje</th>
                                <th class="text-center">Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($descuentos as $descuento)
                                <tr>
                                    <td class="text-center">% {{ $descuento->porcentaje}}</td>
                                    <td class="text-center">
                                        <a href="{{ route('descuento.show', $descuento->id) }}" title="Ver descuento">
                                            <button class="btn btn-info btn-xs">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                        <a href="{{ route('descuento.edit', $descuento->id) }}" title="Editar descuento">
                                            <button class="btn btn-primary btn-xs">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                        <a href="{{ route('descuento.destroy', $descuento->id) }}" class="lnk-borrar" title="Eliminar descuento">
                                            <button class="btn btn-danger btn-xs">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination">{{ $descuentos->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
        @include ('partials.modal.delete', ['modal_label' => 'Borrar descuento', 'modal_body_p' => '¿Desea eliminar el descuento seleccionado?'])
    </div>
@endsection
