<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\PedidoDetalle;

class PedidoDetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request){
        $pedido_detalle = PedidoDetalle::with('cliente','descuento','direccionEnvio')->get();
        return view('pedido_detalle.index', compact('pedido_detalle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(){
        $pedido_detalle = PedidoDetalle::orderBy('razon_social')->lists('razon_social','id');
        $descuento_por_cliente = DescuentoPorCliente::with('cliente','descuento')->get();
        $direccion_por_cliente = DireccionPorCliente::with('cliente','direccion')->get();
        return view('pedido_detalle.create', compact('pedido_detalle','descuento_por_cliente','direccion_por_cliente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request){

        $this->validate($request, [
            'fecha' => 'required',
            'cliente_id' => 'required',
            'descuento_id' => 'required',
            'direccion_envio_id' => 'required'
        ]);

        $requestData = $request->all();

        PedidoDetalle::create($requestData);

        return redirect('pedido');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id){
        $pedido = PedidoDetalle::with('cliente','descuento','direccionEnvio')->get();
        return view('pedido.show', compact('pedido'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id){
        $pedido = PedidoDetalle::findOrFail($id);
        $descuento_por_cliente = DescuentoPorCliente::with('cliente','descuento')->get();
        $direccion_por_cliente = DireccionPorCliente::with('cliente','direccion')->get();
        return view('operacion.edit', compact('cliente','descuento_por_cliente','direccion_por_cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
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

        $pedido = PedidoDetalle::findOrFail($id);
        $pedido->update($requestData);

        return redirect('pedido');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        PedidoDetalle::destroy($id);

        return redirect('pedido');
    }
}
