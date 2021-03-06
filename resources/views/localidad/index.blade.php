@extends('layouts.app')

@section('title', 'Localidades')

@section('content')

    <div class="container">
        <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ route('localidad.create') }}" class="btn btn-success btn-sm" title="Agregar nueva localidad">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            Agregar
                        </a>
                        {!! Form::open(['method' => 'GET', 'url' => '/localidad', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                            <table class="table table-hover text-nowrap" id="tableLocalidades">
                                <thead>
                                <tr>
                                    <th class="text-left" data-field="provincia" data-sortable="true">Provincia</th>
                                    <th class="text-left" data-field="partido" data-sortable="true">Partido</th>
                                    <th class="text-left" data-field="localidad" data-sortable="true">Localidad</th>
                                    <th class="text-center" data-field="codigo_postal" data-sortable="true" width="10%">Código Postal</th>
                                    <th class="text-center" data-field="" data-sortable="false" width="20%">Acción</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($localidades as $localidad)
                                    <tr>
                                        <td class="text-left">{{ $localidad->provincia_nombre }}</td>
                                        <td class="text-left">{{ $localidad->partido_nombre }}</td>
                                        <td class="text-left">{{ $localidad->localidad_nombre }}</td>
                                        <td class="text-center">{{ $localidad->codigo_postal }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('localidad.show', $localidad->id) }}" title="Ver localidad">
                                                <button class="btn btn-info btn-xs">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </button>
                                            </a>
                                            <a href="{{ route('localidad.edit', $localidad->id) }}" title="Editar localidad">
                                                <button class="btn btn-primary btn-xs">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </button>
                                            </a>
                                            <a href="{{ route('localidad.destroy', $localidad->id) }}" class="lnk-borrar" title="Eliminar localidad">
                                                <button class="btn btn-danger btn-xs">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="text-center">
                                <div class="pagination">{{ $localidades->links() }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include ('partials.modal.delete', ['modal_label' => 'Borrar localidad', 'modal_body_p' => '¿Desea eliminar la localidad seleccionada?'])
    </div>
@endsection
