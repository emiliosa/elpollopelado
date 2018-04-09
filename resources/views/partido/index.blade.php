@extends('layouts.app')

@section('title', 'Partidos')

@section('content')

    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{ route('partido.create') }}" class="btn btn-success btn-sm" title="Agregar nuevo partido">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Agregar
                    </a>
                    {!! Form::open(['method' => 'GET', 'url' => '/partido', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                        <table class="table table-hover text-nowrap" id="tablePartidos">
                            <thead>
                            <tr>
                                <th class="text-left" data-field="provincia" data-sortable="true">Provincia</th>
                                <th class="text-left" data-field="prartido" data-sortable="true">Partido</th>
                                <th class="text-center" data-field="" data-sortable="false">Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($partidos as $partido)
                                <tr>
                                    <td class="text-left">{{ $partido->provincia_nombre }}</td>
                                    <td class="text-left">{{ $partido->partido_nombre }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('partido.show', $partido->id) }}" title="Ver partido">
                                            <button class="btn btn-info btn-xs">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                        <a href="{{ route('partido.edit', $partido->id) }}" title="Editar partido">
                                            <button class="btn btn-primary btn-xs">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                        <a href="{{ route('partido.destroy', $partido->id) }}" class="lnk-borrar" title="Eliminar partido">
                                            <button class="btn btn-danger btn-xs">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination">{{ $partidos->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
        @include ('partials.modal.delete', ['modal_label' => 'Borrar partido', 'modal_body_p' => '¿Desea eliminar el partido seleccionado?'])
    </div>
@endsection
