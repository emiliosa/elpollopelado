<?php

namespace App\Http\Controllers;

use App\Moneda;
use App\Repositories\MonedaRepository;
use Illuminate\Http\Request;

use App\Http\Requests;

class MonedaController extends Controller
{
    protected $moneda;

    public function __construct(MonedaRepository $moneda)
    {
        $this->moneda = $moneda;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $monedas = $this->moneda->getMonedas();
        return view('moneda.index', compact('monedas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('moneda.create');
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
            'denominacion' => 'required',
            'codigo' => 'required',
            'simbolo' => 'required'
        ]);

        $requestData = $request->all();

        Moneda::create($requestData);

        return redirect('moneda');
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
        $moneda = $this->moneda->findOrFail($id);

        return view('moneda.show', compact('moneda'));
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
        $moneda = $this->moneda->findOrFail($id);

        return view('moneda.edit', compact('moneda'));
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
            'denominacion' => 'required',
            'codigo' => 'required',
            'simbolo' => 'required'
        ]);
        $requestData = $request->all();

        $moneda = $this->moneda->findOrFail($id);
        $moneda->update($requestData);

        return redirect('moneda');
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
        Moneda::destroy($id);

        return redirect('moneda');
    }
}
