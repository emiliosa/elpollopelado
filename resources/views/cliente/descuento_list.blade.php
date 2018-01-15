<div class="table-responsive">
    <table class="table table-bordered" id="tableDescuentos">
        <thead>
        <tr>
            <th class="text-center">Descuento</th>
            <th class="text-center">Acción</th>
        </tr>
        </thead>
        <tbody>
        @foreach($descuentos_por_cliente as $descuento_por_cliente)
            <tr>
                <td class="text-center">% {{ $descuento_por_cliente->descuento->porcentaje }}</td>
                <td>
                    <button class="btn btn-primary btn-xs" id="btn_modificar_descuento" data-id="{{ $descuento_por_cliente->id }}" data-remote="false" data-toggle="modal" title="Editar descuento"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Editar</button>
                    <button class="btn btn-danger btn-xs" id="btn_borrar_descuento" data-id="{{ $descuento_por_cliente->id }}" title="Borrar descuento"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Borrar</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    
</div>