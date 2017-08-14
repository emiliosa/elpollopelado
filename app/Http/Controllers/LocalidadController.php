<?php

namespace App\Http\Controllers;

use App\Partido;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repositories\PartidoRepository;
use App\Repositories\LocalidadRepository;
use App\Localidad;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class LocalidadController extends Controller
{
    protected $partido;
    protected $localidad;

    public function __construct(PartidoRepository $partido, LocalidadRepository $localidad)
    {
        $this->partido = $partido;
        $this->localidad = $localidad;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request) {
        //$localidad = Localidad::orderBy('nombre','asc')->get();
        $localidades = $this->localidad->getLocalidades();
        return view('localidad.index', compact('localidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        return view('localidad.create');
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
            'partido_id' => 'required',
            'codigo_postal' => 'required',
            'nombre' => 'required'
        ]);

        $requestData = $request->all();

        Localidad::create($requestData);

        return redirect('localidad');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id) {
        //$localidad = Localidad::findOrFail($id);
        $localidad = $this->localidad->findOrFail($id);
        return view('localidad.show', compact('localidad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        //$localidad = Localidad::findOrFail($id);
        $localidad = $this->localidad->findOrFail($id);
        $partido = $this->partido->getPartidos();
        return view('localidad.edit', compact('localidad','partido'));
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
            'partido_id' => 'required',
            'codigo_postal' => 'required',
            'nombre' => 'required'
        ]);
        $requestData = $request->all();

        $localidad = Localidad::findOrFail($id);
        $localidad->update($requestData);

        return redirect('localidad');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id) {
        Localidad::destroy($id);

        return redirect('localidad');
    }

    public function getLocalidadesPorPartido()
    {
        $partido_id = Input::get('partido_id');
        $localidades = $this->localidad->getLocalidadesPorPartido($partido_id);
        return Response::json($localidades);
    }
}
