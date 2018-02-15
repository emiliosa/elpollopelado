@push('styles')
    <style>
        .table>tbody>tr>td, .table>tfoot>tr>td{
            vertical-align: middle;
        }
    </style>
@endpush

@if (sizeof(Cart::content()) > 0)

    <div class="table-responsive">

        <table class="table table-hover" id="cart-table">
            <thead>
            <tr>
                <th class="table-image">Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th></th>
            </tr>
            </thead>

            <tbody>
            @foreach (Cart::content() as $item)

                <tr>
                    <td class="table-image">
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
                    <td>
                        <select class="quantity" data-id="{{ $item->rowId }}">
                            <option {{ $item->qty == 1 ? 'selected' : '' }}>1</option>
                            <option {{ $item->qty == 2 ? 'selected' : '' }}>2</option>
                            <option {{ $item->qty == 3 ? 'selected' : '' }}>3</option>
                            <option {{ $item->qty == 4 ? 'selected' : '' }}>4</option>
                            <option {{ $item->qty == 5 ? 'selected' : '' }}>5</option>
                        </select>
                    </td>
                    <td>
                        ${{ $item->subtotal }}
                    </td>
                    <td>
                        <form action="{{ url('/cart', [$item->rowId]) }}" method="POST" class="side-by-side">
                            {!! csrf_field() !!}
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="submit" class="btn btn-danger btn-sm" value="Quitar">
                        </form>
                    </td>
                </tr>
                
            @endforeach

            </tbody>
            <tfoot>
                <tr>
                    <td></td>
                    <td class="small-caps table-bg" style="text-align: left">Subtotal</td>
                    <td id="subtotal">${{ Cart::instance('default')->subtotal() }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td class="small-caps table-bg" style="text-align: left">Distancia</td>
                    <td id="distancia"> </td>
                    <td></td>
                </tr>
                <tr class="border-bottom">
                    <td><a href="{{ url('/producto') }}" class="btn btn-primary">Agregar más productos</a></td>
                    <td class="small-caps table-bg" style="text-align: left">Total</td>
                    <td class="table-bg" id="total">${{ Cart::total() }}</td>
                    <td><a href="#" class="btn btn-success">Finalizar pedido</a></td>
                </tr>
            </tfoot>
        </table>
    </div>

@else

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        
        <h3>No hay productos seleccionados</h3>
        <a href="{{ url('/producto') }}" class="btn btn-primary">Agregar productos</a>

    </div>

@endif

