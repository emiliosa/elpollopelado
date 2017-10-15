<?php

namespace App\Http\Controllers;

use App\Repositories\ClienteRepository;
use App\Repositories\DescuentoRepository;
use App\Repositories\DireccionRepository;
use App\Repositories\PedidoRepository;
use App\Repositories\PedidoDetalleRepository;
use App\Repositories\ProductoRepository;
use App\Repositories\CategoriaRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

use App\Http\Requests;
use App\Pedido;
use App\Cliente;
use App\DescuentoPorCliente;
use App\DireccionPorCliente;

class PedidoController extends Controller
{
    protected $pedido;
    protected $cliente;
    protected $direccion_envio;
    protected $descuento;
    protected $producto;
    protected $categoria;
    protected $pedido_detalle;

    public function __construct(PedidoRepository $pedido,
                                ClienteRepository $cliente,
                                DireccionRepository $direccion_envio,
                                DescuentoRepository $descuento,
                                ProductoRepository $producto,
                                CategoriaRepository $categoria,
                                PedidoDetalleRepository $pedido_detalle)
    {
        $this->pedido = $pedido;
        $this->cliente = $cliente;
        $this->direccion_envio = $direccion_envio;
        $this->descuento = $descuento;
        $this->producto = $producto;
        $this->categoria = $categoria;
        $this->pedido_detalle = $pedido_detalle;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $pedidos = $this->pedido->getPedidos();
        return view('pedido.index', compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        //$cliente = Cliente::orderBy('razon_social')->lists('razon_social', 'id');
        //$descuento_por_cliente = DescuentoPorCliente::with('cliente', 'descuento')->get();
        //$direccion_por_cliente = DireccionPorCliente::with('cliente', 'direccion')->get();
        //return view('operacion.create', compact('cliente', 'descuento_por_cliente', 'direccion_por_cliente'));
        $clientes = $this->cliente->getClientes();
        $descuentos = $this->descuento->getDescuentosCombo();
        $productos = $this->producto->getProductos();
        $categorias = $this->categoria->getCategorias();
        return view('pedido.create', compact('clientes', 'descuentos', 'productos', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'fecha' => 'required',
            'cliente_id' => 'required',
            'descuento_id' => 'required',
            'direccion_envio_id' => 'required'
        ]);

        $requestData = $request->all();

        Pedido::create($requestData);

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
        $descuento_por_cliente = DescuentoPorCliente::with('cliente', 'descuento')->get();
        $direccion_por_cliente = DireccionPorCliente::with('cliente', 'direccion')->get();
        return view('operacion.edit', compact('cliente', 'descuento_por_cliente', 'direccion_por_cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'fecha' => 'required',
            'cliente_id' => 'required',
            'descuento_id' => 'required',
            'direccion_envio_id' => 'required'
        ]);

        $requestData = $request->all();

        $pedido = Pedido::findOrFail($id);
        $pedido->update($requestData);

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

    public function getDistance()
    {
        $unit = "K";
        $addressFrom = "La Rioja 1884, C1244ABN CABA";
        $addressTo = Input::get('direccion');
        //Change address format
        $formattedAddrFrom = str_replace(' ', '+', $addressFrom);
        $formattedAddrTo = str_replace(' ', '+', $addressTo);

        //Send request and receive json data
        $geocodeFrom = file_get_contents('https://maps.google.com/maps/api/geocode/json?address=' . $formattedAddrFrom . '&sensor=false&key=AIzaSyCDQ3q314fDhgUTuHOcHyXro2_5cjmgEBM');
        $outputFrom = json_decode($geocodeFrom);
        $geocodeTo = file_get_contents('https://maps.google.com/maps/api/geocode/json?address=' . $formattedAddrTo . '&sensor=false&key=AIzaSyCDQ3q314fDhgUTuHOcHyXro2_5cjmgEBM');
        $outputTo = json_decode($geocodeTo);

        //Get latitude and longitude from geo data
        $latitudeFrom = $outputFrom->results[0]->geometry->location->lat;
        $longitudeFrom = $outputFrom->results[0]->geometry->location->lng;
        $latitudeTo = $outputTo->results[0]->geometry->location->lat;
        $longitudeTo = $outputTo->results[0]->geometry->location->lng;

        //Calculate distance from latitude and longitude
        $theta = $longitudeFrom - $longitudeTo;
        $dist = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) + cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);
        if ($unit == "K") {
            $distance = ($miles * 1.609344) . ' km';
        } else if ($unit == "N") {
            $distance = ($miles * 0.8684) . ' nm';
        } else {
            $distance = $miles . ' mi';
        }
        return Response::json(['distancia' => $distance]);
    }

}
