<?php

namespace App\Http\Controllers;

use App\UnidadDeVenta;
use App\Repositories\ProductoRepository;
use App\Repositories\UnidadDeVentaRepository;
use Illuminate\Http\Request;

use App\Http\Requests;

class UnidadDeVentaController extends Controller
{
    protected $unidad_de_venta;
    protected $producto;

    public function __construct(ProductoRepository $producto, UnidadDeVentaRepository $unidad_de_venta)
    {
        $this->producto = $producto;
        $this->unidad_de_venta = $unidad_de_venta;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $estados = $this->unidad_de_venta->getEstados();
        $unidades_de_venta = $this->unidad_de_venta->getUnidadesDeVenta();
        return view('unidad_de_venta.index', compact('unidades_de_venta', 'estados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $productos = $this->producto->getProductosCombo();
        $estados = $this->unidad_de_venta->getEstados();
        return view('unidad_de_venta.create', compact('productos', 'estados'));
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
            'producto_id' => 'required',
            'nro_serie' => 'required',
            'estado' => 'required'
        ]);

        $requestData = $request->all();

        $this->unidad_de_venta->create($requestData);

        return redirect('unidad_de_venta');
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
        $unidad_de_venta = $this->unidad_de_venta->findOrFail($id);
        $estados = $this->producto->getEstados();
        return view('unidad_de_venta.show', compact('unidad_de_venta', 'estados'));
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
        $unidad_de_venta = $this->unidad_de_venta->findOrFail($id);
        $productos = $this->producto->getProductosCombo();
        $estados = $this->producto->getEstados();
        return view('unidad_de_venta.edit', compact('unidad_de_venta', 'productos', 'estados'));
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
            'producto_id' => 'required',
            'nro_serie' => 'required',
            'estado' => 'required'
        ]);
        $requestData = $request->all();
        $this->unidad_de_venta->findOrFail($id)->update($requestData);
        return redirect('unidad_de_venta');
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
        UnidadDeVenta::destroy($id);

        return redirect('unidad_de_venta');
    }
}
