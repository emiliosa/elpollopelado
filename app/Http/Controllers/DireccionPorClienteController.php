<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\DireccionPorCliente;
use App\Repositories\DireccionRepository;
use App\Repositories\ClienteRepository;

class DireccionPorClienteController extends Controller
{
    protected $cliente;
    protected $direccion;
    
    public function __construct(DireccionRepository $direccion, ClienteRepository $cliente)
    {
        $this->direccion = $direccion;
        $this->cliente = $cliente;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request) {
        $direcciones_por_cliente = DireccionPorCliente::with('cliente','direccion')->paginate(15);
        return view('direccion_por_cliente.index', compact('direcciones_por_cliente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        $clientes = $this->cliente->getClientesCombo();
        $direcciones = $this->direccion->getDirecciones();
        return view('direccion_por_cliente.create', compact('clientes','direcciones'));
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
            'direccion_id' => 'required'
        ]);

        $requestData = $request->all();

        DireccionPorCliente::create($requestData);

        return redirect('direccion_por_cliente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id) {
        $direccion_por_cliente = DireccionPorCliente::findOrFail($id);

        return view('direccion_por_cliente.show', compact('direccion_por_cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        $direccion_por_cliente = DireccionPorCliente::findOrFail($id);

        return view('direccion_por_cliente.edit', compact('direccion_por_cliente'));
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
            'direccion_id' => 'required'
        ]);
        $requestData = $request->all();

        $direccion_por_cliente = DireccionPorCliente::findOrFail($id);
        $direccion_por_cliente->update($requestData);

        return redirect('direccion_por_cliente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id) {
        DireccionPorCliente::destroy($id);

        return redirect('direccion_por_cliente');
    }
}
