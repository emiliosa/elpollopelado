@extends('layouts.app')

@section('title', 'Categorías')

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{ route('categoria.create') }}" class="btn btn-success btn-sm" title="Agregar nueva categoría">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Agregar
                    </a>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover text-nowrap" id="tableCategoria">
                            <thead>
                            <tr>
                                <th class="text-center">Descripción</th>
                                <th class="text-center">Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categorias as $categoria)
                                <tr>
                                    <td class="text-center">{{ $categoria->descripcion }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('categoria.show', $categoria->id) }}" title="Ver categoría">
                                            <button class="btn btn-info btn-xs">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                        <a href="{{ route('categoria.edit', $categoria->id) }}" title="Editar categoría">
                                            <button class="btn btn-primary btn-xs">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                        <a href="{{ route('categoria.destroy', $categoria->id) }}" class="lnk-borrar" title="Eliminar categoría">
                                            <button class="btn btn-danger btn-xs">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination">{{ $categorias->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
        @include ('partials.modal.delete', ['modal_label' => 'Borrar categoría', 'modal_body_p' => '¿Desea eliminar la categoría seleccionada?'])
    </div>
@endsection
