<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoDeCliente;
use App\Http\Requests;

class TipoDeClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request) {
        $tipos_de_cliente = TipoDeCliente::orderBy('descripcion', 'asc')->get();
        return view('tipo_de_cliente.index', compact('tipos_de_cliente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        return view('tipo_de_cliente.create');
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
            'descripcion' => 'required'
        ]);

        $requestData = $request->all();

        TipoDeCliente::create($requestData);

        return redirect('tipo_de_cliente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id) {
        $tipo_de_cliente = TipoDeCliente::findOrFail($id);

        return view('tipo_de_cliente.show', compact('tipo_de_cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        $tipo_de_cliente = TipoDeCliente::findOrFail($id);

        return view('tipo_de_cliente.edit', compact('tipo_de_cliente'));
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
            'descripcion' => 'required'
        ]);
        $requestData = $request->all();

        $tipo_de_cliente = TipoDeCliente::findOrFail($id);
        $tipo_de_cliente->update($requestData);

        return redirect('tipo_de_cliente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id) {
        TipoDeCliente::destroy($id);

        return redirect('tipo_de_cliente');
    }
}
