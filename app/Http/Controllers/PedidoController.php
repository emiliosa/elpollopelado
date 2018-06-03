<?php

namespace App\Http\Controllers;

use App\Repositories\ClienteRepository;
use App\Repositories\DescuentoRepository;
use App\Repositories\DireccionRepository;
use App\Repositories\PedidoRepository;
use App\Repositories\ProductoRepository;
use App\Repositories\CategoriaRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Gloudemans\Shoppingcart\Facades\Cart;
//use \Cart as Cart;

use App\Http\Requests;
use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Descuento;
use App\Models\Direccion;
use App\Models\UnidadVenta;
use App\Models\Producto;
use App\Models\DescuentoPorCliente;
use App\Models\DireccionPorCliente;

use App\Http\Requests\PedidoRequest;

class PedidoController extends Controller
{
    protected $pedido;
    protected $cliente;
    protected $direccion_envio;
    protected $descuento;
    protected $producto;
    protected $categoria;
    protected $pedido_detalle;

    public function __construct(
        PedidoRepository $pedido,
        ClienteRepository $cliente,
        DireccionRepository $direccion_envio,
        DescuentoRepository $descuento,
        ProductoRepository $producto,
        CategoriaRepository $categoria
    ) {
        $this->pedido = $pedido;
        $this->cliente = $cliente;
        $this->direccion_envio = $direccion_envio;
        $this->descuento = $descuento;
        $this->producto = $producto;
        $this->categoria = $categoria;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        if ($request->get('search')) {
            $pedidos = $this->pedido->getPedidosSearch($request->get('search'));
        } else {
            $pedidos = Pedido::orderBy('fecha_envio', 'desc')->paginate(15);
        }

        return view('pedido.index', compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $clientes = Cliente::get();

        return view('pedido.create', compact('clientes', 'productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PedidoRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(PedidoRequest $request)
    {
        $pedido = Pedido::create($request->all());

        foreach (Cart::content() as $item) {
            $unidadVenta = UnidadVenta::create([
                'codigo' => null,
                'producto_precio_id' => $item->model->id
            ]);
            //$producto = Producto::find($item->producto->id);
            $pedido->unidadesVenta()->save($unidadVenta, ['cantidad' => $item->qty, 'precio_unitario' => $item->price]);
        }

        Cart::destroy();

        session()->flash('success', 'Pedido creado');

        return redirect('pedido');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $pedido = Pedido::with('cliente', 'descuento', 'direccionEnvio')->get();

        return view('pedido.show', compact('pedido'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $pedido = Pedido::findOrFail($id);
        $clientes = Cliente::get();
        $descuentos = $this->cliente->getDescuentosCombo($pedido->cliente_id);
        $direcciones = $this->cliente->getDireccionesCombo($pedido->cliente_id);

        Cart::destroy();
        session(['cart_edit' => ['value' => true, 'url' => url('/pedido/' . $id . '/edit')]]);

        foreach ($pedido->productos as $producto) {
            Cart::add($producto->id, $producto->descripcion, $producto->pivot->cantidad, $producto->precio_unitario)->associate('App\Models\Producto');
        }

        return view('pedido.edit', compact('pedido', 'clientes', 'descuentos', 'direcciones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param PedidoRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, PedidoRequest $request)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->update($request->all());

        foreach (Cart::content() as $item) {
            $producto[$item->id] = ['cantidad' => $item->qty, 'precio_unitario' => $item->price];
            $pedido->productos()->sync($producto);
        }

        return redirect('pedido');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Pedido::destroy($id);

        return redirect('pedido');
    }

    /** Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return Illuminate\Support\Facades\Response
     */
    public function getPrecioTotal(Request $request)
    {
        $descuento = Descuento::find($request->get('descuento'));
        $direccion = Direccion::has('localidad')->with('localidad.partido.provincia')->find($request->get('direccion'));

        $porcentaje = $descuento ? $descuento->porcentaje : '0.00';
        $distancia = $direccion ?
            $this->getDistancia(
                $direccion->localidad->partido->provincia->nombre . ", " .
                $direccion->localidad->partido->nombre . ", " .
                $direccion->localidad->nombre . ", " .
                $direccion->calle . " " .
                $direccion->altura)
            : '';

        $costoDistancia = floatval($distancia != '' ? ($distancia < floatval('20.00') ? '50.00' : '200.00') : '0.00');
        $subTotal       = Cart::subtotal(2, '.', '');
        $costoDescuento = floatval($porcentaje) * floatval($subTotal / 100);
        $total          = floatval($subTotal + $costoDistancia - $costoDescuento);

        return Response::json([
            'descuento'      => $porcentaje,
            'distancia'      => $distancia . ' km',
            'costoDescuento' => '$' . number_format($costoDescuento, 2, '.', ' '),
            'costoDistancia' => '$' . number_format($costoDistancia, 2, '.', ' '),
            'subtotal'       => '$' . number_format($subTotal, 2, '.', ' '),
            'total'          => '$' . number_format($total, 2, '.', ' ')
        ]);
    }

    /** Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return Illuminate\Support\Facades\Response
     */
    private function getDistancia($addressTo)
    {
        $addressFrom       = "La Rioja 1884, C1244ABN CABA";
        $formattedAddrFrom = str_replace(' ', '+', $addressFrom);
        $formattedAddrTo   = str_replace(' ', '+', $addressTo);

        try {
            $geocodeFrom = file_get_contents('https://maps.google.com/maps/api/geocode/json?address=' . $formattedAddrFrom . '&sensor=false&key=AIzaSyCDQ3q314fDhgUTuHOcHyXro2_5cjmgEBM');
            $geocodeTo   = file_get_contents('https://maps.google.com/maps/api/geocode/json?address=' . $formattedAddrTo . '&sensor=false&key=AIzaSyCDQ3q314fDhgUTuHOcHyXro2_5cjmgEBM');
            $outputFrom  = json_decode($geocodeFrom);
            $outputTo    = json_decode($geocodeTo);
        } catch (ErrorException $e) {
            $outputFrom = false;
            $outputTo   = false;
        }

        if ($outputTo && count($outputTo->results) > 0) {
            //Get latitude and longitude from geo data
            $latitudeFrom = $outputFrom->results[0]->geometry->location->lat;
            $longitudeFrom = $outputFrom->results[0]->geometry->location->lng;
            $latitudeTo = $outputTo->results[0]->geometry->location->lat;
            $longitudeTo = $outputTo->results[0]->geometry->location->lng;

            //Calculate distance from latitude and longitude
            $theta = $longitudeFrom - $longitudeTo;
            $dist  = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) + cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
            $dist  = acos($dist);
            $dist  = rad2deg($dist);
            $miles = $dist * 60 * 1.1515;
        } else {
            $miles = 0;
        }

        $distancia = round(($miles * 1.609344));

        return $distancia;
    }
}
