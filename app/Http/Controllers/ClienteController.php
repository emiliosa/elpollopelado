<?php

namespace App\Http\Controllers;

use App\Models\TipoDeCliente;
use App\Models\TipoDeIdentificacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use App\Models\Cliente;
use App\Repositories\ClienteRepository;
use App\Repositories\TipoDeClienteRepository;
use App\Repositories\TipoDeIdentificacionRepository;
use App\Repositories\DireccionRepository;
use App\Repositories\DescuentoPorClienteRepository;
use App\Http\Requests;

class ClienteController extends Controller
{
    protected $cliente;
    protected $tipo_de_cliente;
    protected $tipo_de_identificacion;
    protected $direccion;
    protected $descuento_por_cliente;

    public function __construct(ClienteRepository $cliente,
                                TipoDeClienteRepository $tipo_de_cliente,
                                TipoDeIdentificacionRepository $tipo_de_identificacion,
                                DireccionRepository $direccion,
                                DescuentoPorClienteRepository $descuento_por_cliente)
    {
        $this->cliente = $cliente;
        $this->tipo_de_cliente = $tipo_de_cliente;
        $this->tipo_de_identificacion = $tipo_de_identificacion;
        $this->direccion = $direccion;
        $this->descuento_por_cliente = $descuento_por_cliente;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $clientes = $this->cliente->getClientes();
        return view('cliente.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $tipos_de_identificacion = $this->tipo_de_identificacion->getTiposDeIdentificacionCombo();
        $tipos_de_cliente = $this->tipo_de_cliente->getTiposDeClienteCombo();
        return view('cliente.create', compact('tipos_de_identificacion', 'tipos_de_cliente'));
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
            'tipo_identificacion_id' => 'required',
            'identificacion' => 'required',
            'tipo_cliente_id' => 'required',
            'razon_social' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required',
            'telefono_celular' => 'required',
            'telefono_fijo' => 'required'
        ]);

        $requestData = $request->all();
        $resource = $this->cliente->create($requestData);
        return redirect()->route('cliente.edit', $resource->id);
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
        $cliente = $this->cliente->findOrFail($id);
        return view('cliente.show', compact('cliente'));
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
        $cliente = $this->cliente->findOrFail($id);
        $tipos_de_identificacion = $this->tipo_de_identificacion->getTiposDeIdentificacionCombo();
        $tipos_de_cliente = $this->tipo_de_cliente->getTiposDeClienteCombo();
        $direcciones = $this->direccion->getDirecciones($id);
        $descuentos_por_cliente = $this->descuento_por_cliente->getDescuentosPorCliente($id);
        return view('cliente.edit', compact('cliente', 'tipos_de_identificacion', 'tipos_de_cliente', 'direcciones', 'descuentos_por_cliente'));
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
            'tipo_identificacion_id' => 'required',
            'identificacion' => 'required',
            'tipo_cliente_id' => 'required',
            'razon_social' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required',
            'telefono_celular' => 'required',
            'telefono_fijo' => 'required'
        ]);
        $requestData = $request->all();
        $this->cliente->findOrFail($id)->update($requestData);
        return redirect('cliente');
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
        Cliente::destroy($id);

        return redirect('cliente');
    }

    public function getClientesSuggestSearch(Request $request)
    {
        return Cliente::search($request->get('q'))->get();
    }
    
    public function getClientesInfo()
    {
        $cliente_id = Input::get('cliente_id');
        $descuentos_por_cliente = $this->descuento_por_cliente->getDescuento($cliente_id);
        $direcciones_por_cliente = $this->direccion->getDirecciones($cliente_id);
        return Response::json([
            'descuentos' => $descuentos_por_cliente,
            'direcciones' => $direcciones_por_cliente]);
    }
}
