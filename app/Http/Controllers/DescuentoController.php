<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Descuento;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use App\Repositories\DescuentoRepository;

class DescuentoController extends Controller
{
    protected $descuento;

    public function __construct(DescuentoRepository $descuento)
    {
        $this->descuento = $descuento;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $descuentos = $this->descuento->getDescuentosPaginate();
        return view('descuento.index', compact('descuentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('descuento.create');
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
            'porcentaje' => 'required'
        ]);

        $requestData = $request->all();

        Descuento::create($requestData);

        return redirect('descuento');
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
        $descuento = Descuento::findOrFail($id);

        return view('descuento.show', compact('descuento'));
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
        $descuento = Descuento::findOrFail($id);

        return view('descuento.edit', compact('descuento'));
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
            'porcentaje' => 'required'
        ]);
        $requestData = $request->all();

        $descuento = Descuento::findOrFail($id);
        $descuento->update($requestData);

        return redirect('descuento');
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
        Descuento::destroy($id);

        return redirect('descuento');
    }
    
    public function getDescuentos(){
        $descuentos = $this->descuento->getDescuentos();
        return Response::json($descuentos);
    }
    
}
