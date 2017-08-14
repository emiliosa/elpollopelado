<div class="table-responsive">
    <table class="table table-bordered" id="tableDirecciones">
        <thead>
        <tr>
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
                    <button class="btn btn-primary btn-xs" id="btn_modificar_direccion" data-id="{{ $direccion->id }}" data-remote="false" data-toggle="modal" title="Editar direccion"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Editar</button>
                    <button class="btn btn-danger btn-xs" id="btn_borrar_direccion" data-id="{{ $direccion->id }}" title="Borrar direccion"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Borrar</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $direcciones->links() }}
</div>