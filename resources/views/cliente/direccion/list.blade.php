<div class="table-responsive">
    <table class="table table-hover" id="table_direcciones">
        <thead>
        <tr>
            <th class="text-left">Provincia</th>
            <th class="text-left">Partido</th>
            <th class="text-left">Localidad</th>
            <th class="text-left">Calle</th>
            <th class="text-center">Altura</th>
            <th class="text-center">Piso</th>
            <th class="text-center">Dpto.</th>
            <th class="text-left">Entrecalles</th>
            <th class="text-center">Acción</th>
        </tr>
        </thead>
        <tbody>
            @if (sizeof($direcciones) > 0)
                @php $emptyRowClass = 'hidden' @endphp
                @foreach($direcciones as $direccion)
                    <tr data-id="{{ $direccion->id }}">
                        <td class="text-left" data-id="{{ $direccion->localidad->partido->provincia->id }}">{{ $direccion->localidad->partido->provincia->nombre }}</td>
                        <td class="text-left" data-id="{{ $direccion->localidad->partido->id }}">{{ $direccion->localidad->partido->nombre }}</td>
                        <td class="text-left" data-id="{{ $direccion->localidad->id }}">{{ $direccion->localidad->nombre }}</td>
                        <td class="text-left">{{ $direccion->calle }}</td>
                        <td class="text-center">{{ $direccion->altura }}</td>
                        <td class="text-center">{{ $direccion->piso }}</td>
                        <td class="text-center">{{ $direccion->dpto }}</td>
                        <td class="text-left">{{ $direccion->entrecalles }}</td>
                        <td class="text-center">
                            <button class="btn btn-danger btn-xs btn-borrar-direccion" title="Borrar direccion">
                                <i class="fa fa-remove" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            @else
                @php $emptyRowClass = '' @endphp
            @endif
            <tr class="text-center {{ $emptyRowClass }}" data-id="-1">
                <td colspan="9">
                    <h4>-- No hay direcciones cargadas --</h4>
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="text-center">
                    <div class="text-right">
                        <button class="btn btn-success btn-sm btn-abrir-modal-direccion">
                            <i class="glyphicon glyphicon-plus"></i>
                        </button>
                    </div>
                </td>
            </tr>
        </tfoot>
    </table>

</div>
