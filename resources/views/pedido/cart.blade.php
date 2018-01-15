@if (sizeof(Cart::content()) > 0)

    <div class="table-responsive">

        <table class="table">
            <thead>
            <tr>
                <th class="table-image">Producto</th>
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
                            {{ $item->model->descripcion }}
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
                <td></td>
                <td class="small-caps table-bg" style="text-align: right">Subtotal</td>
                <td>${{ Cart::instance('default')->subtotal() }}</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td></td>
                <td class="small-caps table-bg" style="text-align: right">Distancia</td>
                <td>{{ Cart::instance('default')->subtotal() }}</td>
                <td></td>
                <td></td>
            </tr>

            <tr class="border-bottom">
                <td class="table-image"></td>
                <td class="small-caps table-bg" style="text-align: right">Total</td>
                <td class="table-bg">${{ Cart::total() }}</td>
                <td class="column-spacer"></td>
                <td></td>
            </tr>

            </tbody>
        </table>

    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    
        <form action="{{ url('/emptyCart') }}" method="POST">
            {!! csrf_field() !!}
            <input type="hidden" name="_method" value="DELETE">
            <a href="{{ url('/producto') }}" class="btn btn-primary">Agregar más productos</a>
            <a href="#" class="btn btn-success">Finalizar pedido</a>
            <input type="submit" class="btn btn-danger" value="Vaciar pedido">
        </form>

    </div>

@else

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        
        <h3>No hay productos seleccionados</h3>
        <a href="{{ url('/producto') }}" class="btn btn-primary">Agregar productos</a>

    </div>

@endif

