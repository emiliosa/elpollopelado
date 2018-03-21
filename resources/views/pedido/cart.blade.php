@push('styles')
    <style>
        /*.table>tbody>tr>td, .table>tfoot>tr>td{
            vertical-align: middle;
        }*/
    </style>
@endpush
<div class="table-responsive">
    <div class="form-group">
        <table class="table table-hover" id="table-cart">
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
                        <tr id="tr{{ $loop->iteration }}">
                            <td class="table-image text-left">
                                <a href="{{ url('producto', [$item->model->id]) }}">
                                    <div class="col-sm-2 hidden-xs">
                                        <img src="{!! Storage::url(str_replace('.jpeg', '_small.jpeg', $item->model->imagen)) !!}" alt="Imágen no disponible" class="img-responsive cart-image">
                                    </div>
                                    <div>
                                        <h4 class="nomargin">{{ $item->model->descripcion }}</h4>
                                        <p>{{ $item->model->observaciones }}</p>
                                    </div>
                                </a>
                            </td>
                            <td class="text-left">
                                <select class="quantity" data-id="{{ $item->rowId }}">
                                    <option {{ $item->qty == 1 ? 'selected' : '' }}>1</option>
                                    <option {{ $item->qty == 2 ? 'selected' : '' }}>2</option>
                                    <option {{ $item->qty == 3 ? 'selected' : '' }}>3</option>
                                    <option {{ $item->qty == 4 ? 'selected' : '' }}>4</option>
                                    <option {{ $item->qty == 5 ? 'selected' : '' }}>5</option>
                                </select>
                            </td>
                            <td class="text-right">${{ $item->subtotal }}</td>
                            <td class="text-right">
                                <input type="button" data-id="{{ $item->rowId }}" class="btn btn-danger btn-sm btn-quitar-producto" value="Quitar">
                            </td>
                        </tr>
                    @endforeach
                @else
                    @php $emptyRowClass = '' @endphp
                @endif
                <tr id="tr0" class="text-center {{ $emptyRowClass }}"><td colspan="4"><h4>-- No hay productos seleccionados --</h4></td></tr>
            </tbody>
            <tfoot>
                <tr>
                    <td></td>
                    <td class="small-caps table-bg text-left">Subtotal</td>
                    <td class="text-right" id="subtotal">${{ Cart::instance('default')->subtotal() }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-left"></td>
                    <td class="small-caps table-bg text-left">Distancia</td>
                    <td class="text-right" id="distancia"></td>
                    <td></td>
                </tr>
                <tr class="border-bottom">
                    <td><a href="{{ url('/producto') }}" class="btn btn-primary">Agregar más productos</a></td>
                    <td class="small-caps table-bg text-left">Total</td>
                    <td class="table-bg text-right" id="total">${{ Cart::total() }}</td>
                    <td class="text-right">{!! Form::submit($submitButtonText, ['class' => 'btn btn-success']) !!}</td>
                    <div class="form-group">
                </tr>
            </tfoot>
        </table>
        <span class="help-block span-producto hidden">Seleccione un producto al menos</span>
    </div>
</div>