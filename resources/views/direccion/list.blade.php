<div class="table-responsive">
    <table class="table table-bordered" id="tableDirecciones">
        <thead>
        <tr>
            <th class="text-center">Cliente</th>
            <th class="text-center">Provincia</th>
            <th class="text-center">Partido</th>
            <th class="text-center">Localidad</th>
            <th class="text-center">Calle</th>
            <th class="text-center">Altura</th>
            <th class="text-center">Piso</th>
            <th class="text-center">Dpto.</th>
            <th class="text-center">Entrecalles</th>
            <th class="text-center">Acción</th>
        </tr>
        </thead>
        <tbody>
        @foreach($direcciones as $direccion)
            <tr>
                <td class="text-center">{{ $direccion->provincia->nombre }}</td>
                <td class="text-center">{{ $direccion->partido->nombre }}</td>
                <td class="text-center">{{ $direccion->localidad->nombre }}</td>
                <td class="text-center">{{ $direccion->calle }}</td>
                <td class="text-center">{{ $direccion->altura }}</td>
                <td class="text-center">{{ $direccion->piso }}</td>
                <td class="text-center">{{ $direccion->dpto }}</td>
                <td class="text-center">{{ $direccion->entrecalles }}</td>
                <td>
                    <a href="{{ route('direccion.show', $direccion->id) }}" title="Ver direccion">
                        <button class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            Ver
                        </button>
                    </a>
                    <a href="{{ route('direccion.edit', $direccion->id) }}" title="Editar direccion">
                        <button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            Editar
                        </button>
                    </a>
                    {!! Form::open([
                        'method'=>'DELETE',
                        'route' => ['direccion.destroy', $direccion->id],
                        'style' => 'display:inline'
                        ]) !!}
                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Borrar', array(
                        'type' => 'submit',
                        'class' => 'btn btn-danger btn-xs',
                        'title' => 'Eliminar direccion',
                        'onclick'=>'return confirm("Confirmar eliminación?")'
                        )) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $direcciones->links() }}
</div>