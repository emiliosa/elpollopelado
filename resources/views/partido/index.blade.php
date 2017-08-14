@extends('layouts.app')

@section('title', 'Partidos')

@section('content')

    <script type="text/javascript">
        /*$(document).ready(function() {
            $('#tablePartidos').DataTable({
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
                        <a href="{{ route('partido.create') }}" class="btn btn-success btn-sm" title="Agregar nuevo partido">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            Agregar
                        </a>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="tablePartidos">
                                <thead>
                                <tr>
                                    <th class="text-center" data-field="provincia" data-sortable="true">Provincia</th>
                                    <th class="text-center" data-field="prartido" data-sortable="true">Partido</th>
                                    <th class="text-center" data-field="" data-sortable="false">Acción</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($partidos as $partido)
                                    <tr>
                                        <td class="text-center">{{ $partido->provincia->nombre }}</td>
                                        <td class="text-center">{{ $partido->nombre }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('partido.show', $partido->id) }}" title="Ver partido">
                                                <button class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    Ver
                                                </button>
                                            </a>
                                            <a href="{{ route('partido.edit', $partido->id) }}" title="Editar partido">
                                                <button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    Editar
                                                </button>
                                            </a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'route' => ['partido.destroy', $partido->id],
                                                'style' => 'display:inline'
                                                ]) !!}
                                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Borrar', array(
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-xs',
                                                'title' => 'Eliminar partido',
                                                'onclick'=>'return confirm("Confirmar eliminación?")'
                                                )) !!}
                                            {!! Form::close() !!}
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
        </div>
    </div>
@endsection