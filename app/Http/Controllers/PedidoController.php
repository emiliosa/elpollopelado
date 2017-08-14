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

}
