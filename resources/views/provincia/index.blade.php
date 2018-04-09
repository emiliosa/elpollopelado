@extends('layouts.app')

@section('title', 'Provincias')

@section('content')

    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{ route('provincia.create') }}" class="btn btn-success btn-sm" title="Agregar nueva provincia">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Agregar
                    </a>
                    {!! Form::open(['method' => 'GET', 'url' => '/provincia', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Buscar...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    {!! Form::close() !!}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover text-nowrap" id="tableProvincias">
                            <thead>
                            <tr>
                                <th class="text-left" data-sortable="true">Provincia</th>
                                <th class="text-center" data-sortable="false">Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($provincias as $provincia)
                                <tr>
                                    <td class="text-left">{{ $provincia->nombre }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('provincia.show', $provincia->id) }}" title="Ver provincia">
                                            <button class="btn btn-info btn-xs">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                        <a href="{{ route('provincia.edit', $provincia->id) }}" title="Editar provincia">
                                            <button class="btn btn-primary btn-xs">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                        <a href="{{ route('provincia.destroy', $provincia->id) }}" class="lnk-borrar" title="Eliminar provincia">
                                            <button class="btn btn-danger btn-xs">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination">{{ $provincias->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
        @include ('partials.modal.delete', ['modal_label' => 'Borrar provincia', 'modal_body_p' => '¿Desea eliminar la provincia seleccionada?'])
    </div>
@endsection
