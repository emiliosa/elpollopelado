@if (sizeof(Cart::content()) > 0)

    <table class="table">
        <thead>
        <tr>
            <th class="table-image"></th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th class="column-spacer"></th>
            <th></th>
        </tr>
        </thead>

        <tbody>
        @foreach (Cart::content() as $item)

            <tr>
                <td class="table-image">
                    <a href="{{ url('producto', [$item->model->id]) }}">
                        <img src="{!! Storage::url(str_replace('.jpeg', '_small.jpeg', $item->model->imagen)) !!}" alt="Imágen no disponible" class="img-responsive cart-image">
                    </a>
                </td>
                <td><a href="{{ url('producto', [$item->model->id]) }}">{{ $item->model->descripcion }}</a></td>
                <td>
                    <select class="quantity" data-id="{{ $item->rowId }}">
                        <option {{ $item->qty == 1 ? 'selected' : '' }}>1</option>
                        <option {{ $item->qty == 2 ? 'selected' : '' }}>2</option>
                        <option {{ $item->qty == 3 ? 'selected' : '' }}>3</option>
                        <option {{ $item->qty == 4 ? 'selected' : '' }}>4</option>
                        <option {{ $item->qty == 5 ? 'selected' : '' }}>5</option>
                    </select>
                </td>
                <td>${{ $item->subtotal }}</td>
                <td class=""></td>
                <td>
                    <form action="{{ url('/cart', [$item->rowId]) }}" method="POST" class="side-by-side">
                        {!! csrf_field() !!}
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" class="btn btn-danger btn-sm" value="Quitar">
                    </form>
                </td>
            </tr>
            
        @endforeach
        <tr>
            <td class="table-image"></td>
            <td></td>
            <td class="small-caps table-bg" style="text-align: right">Subtotal</td>
            <td>${{ Cart::instance('default')->subtotal() }}</td>
            <td></td>
            <td></td>
        </tr>

        <tr class="border-bottom">
            <td class="table-image"></td>
            <td style="padding: 40px;"></td>
            <td class="small-caps table-bg" style="text-align: right">Total</td>
            <td class="table-bg">${{ Cart::total() }}</td>
            <td class="column-spacer"></td>
            <td></td>
        </tr>

        </tbody>
    </table>

    <div style="float:right">
        <form action="{{ url('/emptyCart') }}" method="POST">
            {!! csrf_field() !!}
            <input type="hidden" name="_method" value="DELETE">
            <input type="submit" class="btn btn-danger" value="Vaciar pedido">
        </form>
    </div>

    <a href="{{ url('/producto') }}" class="btn btn-primary">Agregar más productos</a> &nbsp;
    <a href="#" class="btn btn-success">Finalizar pedido</a>

@else

    <h3>No hay productos seleccionados</h3>
    <a href="{{ url('/producto') }}" class="btn btn-primary">Agregar productos</a>

@endif

