<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoDeIdentificacion;
use App\Http\Requests;

class TipoDeIdentificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request) {
        $tipos_de_identificacion = TipoDeIdentificacion::orderBy('descripcion', 'asc')->get();
        return view('tipo_de_identificacion.index', compact('tipos_de_identificacion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        return view('tipo_de_identificacion.create');
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

        TipoDeIdentificacion::create($requestData);

        return redirect('tipo_de_identificacion');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id) {
        $tipo_de_identificacion = TipoDeIdentificacion::findOrFail($id);

        return view('tipo_de_identificacion.show', compact('tipo_de_identificacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        $tipo_de_identificacion = TipoDeIdentificacion::findOrFail($id);

        return view('tipo_de_identificacion.edit', compact('tipo_de_identificacion'));
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

        $tipo_de_identificacion = TipoDeIdentificacion::findOrFail($id);
        $tipo_de_identificacion->update($requestData);

        return redirect('tipo_de_identificacion');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id) {
        TipoDeIdentificacion::destroy($id);

        return redirect('tipo_de_identificacion');
    }
}
