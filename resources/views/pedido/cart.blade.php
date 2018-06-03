@push('styles')
    <style>
        .align-middle {
            vertical-align: middle !important;
        }
    </style>
@endpush

<div class="table-responsive">
    <div class="form-group">
        <table class="table table-hover" id="table_cart">
            <thead>
            <tr>
                <th class="table-image text-left">Producto</th>
                <th class="text-left">Cantidad</th>
                <th class="text-right">Precio</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                @if (sizeof(Cart::content()) > 0)
                    @php $emptyRowClass = 'hidden' @endphp
                    @foreach (Cart::content() as $item)
                        <tr data-id="{{ $item->model->producto->id }}" data-rowid="{{ $item->rowId }}">
                            <td class="table-image text-left align-middle">
                                <a href="{{ url('producto', [$item->model->producto->id]) }}">
                                    <div class="">
                                        <img src="{!! Storage::url(str_replace('.jpeg', '_small.jpeg', $item->model->producto->imagen)) !!}" alt="Imágen no disponible" class="img-responsive cart-image">
                                    </div>
                                    <div>
                                        <h4 class="nomargin">{{ $item->model->producto->descripcion }}</h4>
                                        <p>{{ $item->model->producto->observaciones }}</p>
                                    </div>
                                </a>
                            </td>
                            <td class="text-left align-middle">
                                <select class="quantity" data-rowid="{{ $item->rowId }}">
                                    @for ($i = 1 ; $i <= 15 ; $i++)
                                        <option value={{ $i }} {{ $i == $item->qty ? "selected='selected'" : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </td>
                            <td class="text-right align-middle">${{ $item->model->getPrecioUnitarioFormatted() }}</td>
                            <td class="text-center align-middle">
                                <button class="btn btn-danger btn-xs btn-quitar-producto" title="Quitar">
                                    <i class="fa fa-remove" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @else
                    @php $emptyRowClass = '' @endphp
                @endif
                <tr class="text-center {{ $emptyRowClass }}" data-id="-1">
                    <td colspan="4">
                        <h4>-- No hay productos seleccionados --</h4>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td></td>
                    <td class="small-caps table-bg text-left">Subtotal</td>
                    <td class="text-right" id="subtotal">${{ Cart::subtotal(2, '.', ' ') }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td class="small-caps table-bg text-left">Descuento</td>
                    <td class="text-right" id="costo_descuento">$0.00</td>
                    <td class="text-center" id="descuento">(0 %)</td>
                </tr>
                <tr>
                    <td></td>
                    <td class="small-caps table-bg text-left">Distancia</td>
                    <td class="text-right" id="costo_distancia">$0.00</td>
                    <td class="text-center" id="distancia">(0 km)</td>
                </tr>
                <tr>
                    <td></td>
                    <td class="small-caps table-bg text-left">Total</td>
                    <td class="table-bg text-right" id="total">${{ Cart::total(2, '.', ' ') }}</td>
                    <td></td>
                </tr>
                <tr class="border-bottom">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-center">
                        <div class="text-center">
                            <a href="{{ url('/producto') }}" class="btn btn-success btn-sm" title="Agregar producto">
                                <i class="glyphicon glyphicon-plus"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            </tfoot>
        </table>
        <span class="help-block span-table-producto hidden">Seleccione un producto al menos</span>
    </div>
</div>
