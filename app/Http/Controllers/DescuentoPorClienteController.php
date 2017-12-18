<?php

namespace App\Http\Controllers;

use App\Repositories\DescuentoPorClienteRepository;
use Illuminate\Http\Request;
use App\Models\DescuentoPorCliente;
use App\Http\Requests;
use App\Repositories\DescuentoRepository;
use App\Repositories\ClienteRepository;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class DescuentoPorClienteController extends Controller
{
    protected $descuento;
    protected $cliente;
    protected $descuento_por_cliente;
    
    public function __construct(DescuentoRepository $descuento,
                                ClienteRepository $cliente,
                                DescuentoPorClienteRepository $descuento_por_cliente)
    {
        $this->descuento = $descuento;
        $this->cliente = $cliente;
        $this->descuento_por_cliente = $descuento_por_cliente;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request) {
        //return view('descuento_por_cliente.index', compact('descuentos_por_cliente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        $clientes = $this->cliente->getClientesCombo();
        $descuentos = $this->descuento->getDescuentosCombo();
        return view('descuento_por_cliente.create', compact('descuentos', 'clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request) {
        $this->validate($request, [
            'cliente_id' => 'required',
            'descuento_id' => 'required'
        ]);

        $requestData = $request->all();

        DescuentoPorCliente::create($requestData);

        //return redirect('descuento_por_cliente');
        return redirect()->route('cliente.edit', $request->cliente_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id) {
        //return view('descuento_por_cliente.show', compact('descuento_por_cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        //return view('descuento_por_cliente.edit', compact('descuento_por_cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request) {
        $this->validate($request, [
            'cliente_id' => 'required',
            'descuento_id' => 'required'
        ]);
        $requestData = $request->all();

        $descuento_por_cliente = $this->descuento_por_cliente->findOrFail($id);
        $descuento_por_cliente->update($requestData);

        //return redirect('descuento_por_cliente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id) {
        DescuentoPorCliente::destroy($id);
        //return redirect('descuento_por_cliente');
    }
    
    public function getDescuentoPorCliente()
    {
        $id = Input::get('id');
        $cliente_id = Input::get('cliente_id');
        if ($id){
            $descuento_por_cliente = $this->descuento_por_cliente->findOrFail($id);
        }elseif ($cliente_id){
            $descuento_por_cliente = $this->descuento_por_cliente->getDescuento($cliente_id);
        }
        return Response::json($descuento_por_cliente);
    }
    
}
