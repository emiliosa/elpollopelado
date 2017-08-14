@extends('layouts.app')

@section('title', 'Provincias')

@section('content')

    <script type="text/javascript">
        $(document).ready(function() {
            /*$('#tableProvincias').DataTable({
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "zeroRecords": "Nada para mostrar - perdon",
                    "info": "Página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros",
                    "infoFiltered": "(filtrados de _MAX_ total registros)"
                },
                "processing": true,
                "serverSide": true,
                "ajax": "dataTables/provincias",
                "columns": [
                    {data: 'id'},
                    {data: 'nombre'},
                    null
                ],
            });*/
        });
    </script>

    <div class="container">
        <div class="row">
            <div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ route('provincia.create') }}" class="btn btn-success btn-sm" title="Agregar nueva provincia">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            Agregar
                        </a>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="tableProvincias">
                                <thead>
                                <tr>
                                    <th class="text-center" data-sortable="true">Provincia</th>
                                    <th class="text-center" data-sortable="false">Acción</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($provincias as $provincia)
                                    <tr>
                                        <td class="text-center">{{ $provincia->nombre }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('provincia.show', $provincia->id) }}" title="Ver provincia">
                                                <button class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    Ver
                                                </button>
                                            </a>
                                            <a href="{{ route('provincia.edit', $provincia->id) }}" title="Editar provincia">
                                                <button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    Editar
                                                </button>
                                            </a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'route' => ['provincia.destroy', $provincia->id],
                                                'style' => 'display:inline'
                                                ]) !!}
                                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Borrar', array(
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-xs',
                                                'title' => 'Eliminar provincia',
                                                'onclick'=>'return confirm("Confirmar eliminación?")'
                                                )) !!}
                                            {!! Form::close() !!}
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
        </div>
    </div>
@endsection