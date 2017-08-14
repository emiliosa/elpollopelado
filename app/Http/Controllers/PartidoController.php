<?php

namespace App\Http\Controllers;

use App\Partido;
use App\Repositories\PartidoRepository;
use App\Repositories\ProvinciaRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use App\Http\Requests;

class PartidoController extends Controller
{
    protected $partido;
    protected $provincia;

    public function __construct(PartidoRepository $partido, ProvinciaRepository $provincia)
    {
        $this->partido = $partido;
        $this->provincia = $provincia;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request) {
        //$limit = Config::has($request->get('page')) ? $request->get('page') : 10;
        //$partido = Partido::with('provincia')->orderBy('nombre','asc')->paginate($limit);
        $partidos = $this->partido->getPartidosPorProvincia();
        return view('partido.index', compact('partidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        //$provincia = Provincia::orderBy('nombre','asc')->lists('nombre','id');
        $provincia = $this->provincia->getProvinciasCombo();
        return view('partido.create', compact('provincia'));
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
            'provincia_id' => 'required',
            'nombre' => 'required'
        ]);

        $requestData = $request->all();

        Partido::create($requestData);

        return redirect('partido');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id) {
        $partido = $this->partido->findOrFail($id);
        //$provincia = Provincia::orderBy('nombre','asc')->lists('nombre','id');
        $provincia = $this->provincia->getProvincias();
        return view('partido.show', compact('partido','provincia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        $partido = $this->partido->findOrFail($id);
        //$provincia = Provincia::orderBy('nombre','asc')->lists('nombre','id');
        $provincia = $this->provincia->getProvinciasCombo();
        return view('partido.edit', compact('partido','provincia'));
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
            'provincia_id' => 'required',
            'nombre' => 'required'
        ]);
        $requestData = $request->all();

        //$partido = Partido::findOrFail($id);
        $partido = $this->partido->findOrFail($id);
        $partido->update($requestData);

        return redirect('partido');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id) {
        Partido::destroy($id);

        return redirect('partido');
    }

    public function dataTables()
    {
        return Datatables::eloquent($this->partido->getPartidosPorProvincia())->make(true);
    }

    public function getPartidosPorProvincia()
    {
        $provincia_id = Input::get('provincia_id');
        $partidos = $this->partido->getPartidosPorProvincia($provincia_id);
        return Response::json($partidos);
    }
}
