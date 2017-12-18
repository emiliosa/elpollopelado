<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use App\Models\Direccion;
use App\Repositories\ProvinciaRepository;
use App\Repositories\PartidoRepository;
use App\Repositories\LocalidadRepository;
use App\Repositories\DireccionRepository;
use App\Repositories\ClienteRepository;

use App\Http\Requests;

class DireccionController extends Controller
{
    protected $provincia;
    protected $partido;
    protected $localidad;
    protected $direccion;
    protected $cliente;

    public function __construct(ProvinciaRepository $provincia, PartidoRepository $partido, LocalidadRepository $localidad, DireccionRepository $direccion, ClienteRepository $cliente)
    {
        $this->provincia = $provincia;
        $this->partido = $partido;
        $this->localidad = $localidad;
        $this->direccion = $direccion;
        $this->cliente = $cliente;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $direcciones = $this->direccion->getDirecciones();
        return view('direccion.index', compact('direcciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $provincias = $this->provincia->getProvinciasCombo();
        $clientes = $this->cliente->getClientesCombo();
        return view('direccion.create', compact('provincias', 'clientes'));
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
            'provincia_id' => 'required',
            'partido_id' => 'required',
            'localidad_id' => 'required',
            'calle' => 'required',
            'altura' => 'required'
        ]);

        $requestData = $request->all();

        Direccion::create($requestData);

        //return redirect('direccion');
        return redirect()->route('cliente.edit', $request->cliente_id);
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
        $direccion = $this->direccion->findOrFail($id);
        return view('direccion.show', compact('direccion'));
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
        $direccion = $this->direccion->findOrFail($id);
        $provincia = $this->provincia->getProvinciasCombo();
        $partido = $this->partido->getPartidosCombo();
        $localidad = $this->localidad->getLocalidadesCombo();
        return view('direccion.edit', compact('direccion', 'provincia', 'partido', 'localidad'));
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
            'localidad_id' => 'required',
            'calle' => 'required',
            'altura' => 'required'
        ]);
        $requestData = $request->all();

        $direccion = Direccion::findOrFail($id);
        $direccion->update($requestData);

        //return redirect('direccion');
        //return redirect()->route('cliente.edit', $request->cliente_id);
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
        Direccion::destroy($id);
        //return redirect('direccion');
    }

    public function getDireccion()
    {
        $id = Input::get('id');
        $direccion = $this->direccion->findOrFail($id);
        $partidos = $this->partido->getPartidosPorProvincia($direccion->provincia_id);
        $localidades = $this->localidad->getLocalidadesPorPartido($direccion->partido_id);
        return Response::json([
            'direccion' => $direccion,
            'partidos' => $partidos,
            'localidades' => $localidades]);
    }

}

