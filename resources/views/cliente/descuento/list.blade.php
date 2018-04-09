<div class="table-responsive">
    <table class="table table-hover" id="table_descuentos">
        <thead>
        <tr>
            <th class="text-center">Descuento</th>
            <th class="text-center">Acción</th>
        </tr>
        </thead>
        <tbody>
            @if (sizeof($descuentos) > 0)
                @php $emptyRowClass = 'hidden' @endphp
                @foreach($descuentos as $descuento)
                    <tr data-id="{{ $descuento->id }}">
                        <td class="text-center">{{ $descuento->porcentaje }}</td>
                        <td class="text-center">
                            <button class="btn btn-danger btn-xs btn-borrar-descuento" title="Borrar descuento">
                                <i class="fa fa-remove" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            @else
                @php $emptyRowClass = '' @endphp
            @endif
            <tr class="text-center {{ $emptyRowClass }}" data-id="-1">
                <td colspan="2">
                    <h4>-- No hay descuentos cargados --</h4>
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td></td>
                <td class="text-center">
                    <div class="text-right">
                        <button class="btn btn-success btn-sm btn-abrir-modal-descuento">
                            <i class="glyphicon glyphicon-plus"></i>
                        </button>
                    </div>
                </td>
            </tr>
        </tfoot>
    </table>

</div>
