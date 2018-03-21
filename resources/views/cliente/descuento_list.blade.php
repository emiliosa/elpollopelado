<div class="table-responsive">
    <table class="table table-hover" id="table_descuentos">
        <thead>
        <tr>
            <th class="text-center">Descuento</th>
            <th class="text-center">Acción</th>
        </tr>
        </thead>
        <tbody>
        @foreach($descuentos as $descuento)
            <tr data-id="{{ $descuento->id }}">
                <td class="text-center">% {{ $descuento->porcentaje }}</td>
                <td class="text-center">
                    <button class="btn btn-danger btn-xs btn-borrar-descuento" title="Borrar descuento">
                        <i class="fa fa-remove" aria-hidden="true"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="text-right">
        <button class="btn btn-success btn-sm" id="btn_abrir_descuento">
            <i class="glyphicon glyphicon-plus"></i>
        </button>
    </div>
    
</div>