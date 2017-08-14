@extends('layouts.app')

@section('title', 'Localidades')

@section('content')

    <script type="text/javascript">
        /*$(document).ready(function() {
            $('#tableLocalidades').DataTable({
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "zeroRecords": "Nada para mostrar - perdon",
                    "info": "Página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros",
                    "infoFiltered": "(filtrados de _MAX_ total registros)"
                },
                "processing": true,
                 "serverSide": true,
                 "ajax": "dataTables/partidosPorProvincia",
                 "columns": [
                 {data: 'provincia.nombre'},
                 {data: 'partido.nombre'}
                 ],
            });
        });*/
    </script>

    <div class="container">
        <div class="row">
            <div>
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
                            <table class="table table-striped table-bordered" id="tableLocalidades">
                                <thead>
                                <tr>
                                    <th class="text-center" data-field="provincia" data-sortable="true">Partido</th>
                                    <th class="text-center" data-field="prartido" data-sortable="true">Localidad</th>
                                    <th class="text-center" data-field="codigo_postal" data-sortable="true">Código Postal</th>
                                    <th class="text-center" data-field="" data-sortable="false">Acción</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($localidades as $localidad)
                                    <tr>
                                        <td class="text-center">{{ $localidad->partido->nombre }}</td>
                                        <td class="text-center">{{ $localidad->nombre }}</td>
                                        <td class="text-center">{{ $localidad->codigo_postal }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('localidad.show', $localidad->id) }}" title="Ver localidad">
                                                <button class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    Ver
                                                </button>
                                            </a>
                                            <a href="{{ route('localidad.edit', $localidad->id) }}" title="Editar localidad">
                                                <button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    Editar
                                                </button>
                                            </a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'route' => ['localidad.destroy', $localidad->codigo_postal],
                                                'style' => 'display:inline'
                                                ]) !!}
                                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Borrar', array(
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-xs',
                                                'title' => 'Eliminar localidad',
                                                'onclick'=>'return confirm("Confirmar eliminación?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination">{{ $localidades->links() }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection