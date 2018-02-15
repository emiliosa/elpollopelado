<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provincia;
use App\Repositories\ProvinciaRepository;
use App\Http\Requests;
use Illuminate\Support\Facades\Response;

class ProvinciaController extends Controller
{
    protected $provincia;

    public function __construct(ProvinciaRepository $provincia)
    {
        $this->provincia = $provincia;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request) {
        if ($request->get('search')) {
            $provincias = $this->provincia->getProvinciasSearch($request->get('search'));
        } else {
            $provincias = $this->provincia->getProvincias();
        }
        
        return view('provincia.index', compact('provincias'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        return view('provincia.create');
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
            'nombre' => 'required'
        ]);
        $requestData = $request->all();
        Provincia::create($requestData);
        return redirect('provincia');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id) {
        $provincia = Provincia::findOrFail($id);
        return view('provincia.show', compact('provincia'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        $provincia = Provincia::findOrFail($id);
        return view('provincia.edit', compact('provincia'));
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
            'nombre' => 'required'
        ]);
        $requestData = $request->all();
        $provincia = Provincia::findOrFail($id);
        $provincia->update($requestData);
        return redirect('provincia');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id) {
        Provincia::destroy($id);
        return redirect('provincia');
    }

    public function dataTables()
    {
        //return Datatables::eloquent($this->provincia->getProvincias())->make(true);
        return Datatables::eloquent(Provincia::query())->make(true);
    }

    public function getProvincias()
    {
        return $this->provincia->getProvinciasJson();
    }
}
