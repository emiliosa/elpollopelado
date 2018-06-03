<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Direccion;
use App\Repositories\ClienteRepository;
use App\Repositories\DireccionRepository;
use App\Repositories\TipoDeClienteRepository;
use App\Repositories\TipoDeIdentificacionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\ClienteRequest;
use Validator;

class ClienteController extends Controller
{
    protected $cliente;
    protected $tipo_de_cliente;
    protected $tipo_de_identificacion;
    protected $direccion;

    public function __construct(
        ClienteRepository $cliente,
                                TipoDeClienteRepository $tipo_de_cliente,
                                TipoDeIdentificacionRepository $tipo_de_identificacion,
                                DireccionRepository $direccion
    ) {
        $this->cliente                = $cliente;
        $this->tipo_de_cliente        = $tipo_de_cliente;
        $this->tipo_de_identificacion = $tipo_de_identificacion;
        $this->direccion              = $direccion;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $clientes = $this->cliente->getClientes();
        return view('cliente.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $tipos_de_identificacion = $this->tipo_de_identificacion->getTiposDeIdentificacionCombo();
        $tipos_de_cliente        = $this->tipo_de_cliente->getTiposDeClienteCombo();

        return view('cliente.create', compact('tipos_de_identificacion', 'tipos_de_cliente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ClienteRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ClienteRequest $request)
    {
        $requestData = $request->all();
        $resource    = $this->cliente->create($requestData);

        return redirect()->route('cliente.edit', $resource->id);
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
        $cliente = $this->cliente->findOrFail($id);
        return view('cliente.show', compact('cliente'));
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
        $cliente                 = $this->cliente->findOrFail($id);
        $tipos_de_identificacion = $this->tipo_de_identificacion->getTiposDeIdentificacionCombo();
        $tipos_de_cliente        = $this->tipo_de_cliente->getTiposDeClienteCombo();
        $direcciones             = $cliente->direcciones;
        $descuentos              = $cliente->descuentos;
        //dd($direcciones);

        return view('cliente.edit', compact('cliente', 'tipos_de_identificacion', 'tipos_de_cliente', 'direcciones', 'descuentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param ClienteRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, ClienteRequest $request)
    {
        $cliente = $this->cliente->findOrFail($id);

        //actualizar modelos relacionados
        $descuentosRequest  = $request->has('descuentos') ? json_decode($request->get('descuentos')) : array();
        $direccionesRequest = $request->has('direcciones') ? json_decode($request->get('direcciones')) : array();
        $descuentos         = array();
        $direcciones        = $cliente->direcciones;

        foreach ($descuentosRequest as $descuento) {
            $descuentos[] = $descuento->descuento_id;
        }

        //array de ids de direcciones
        $direccionOldIds = array_pluck($direcciones, 'id');
        $direccionNewIds = array_pluck($direccionesRequest, 'id');

        //direcciones a eliminar
        $deleteDirecciones = collect($direcciones)
            ->filter(function ($model) use ($direccionNewIds) {
                return !in_array($model->id, $direccionNewIds);
            });

        //direcciones a actualizar
        $updateDirecciones = collect($direccionesRequest)
            ->filter(function ($model) use ($direccionOldIds) {
                return property_exists($model, 'id') && in_array($model->id, $direccionOldIds);
            });

        //direcciones a crear
        $createDirecciones = collect($direccionesRequest)
            ->filter(function ($model) {
                return empty($model->id);
            });

        //eliminar direcciones (softdelete)
        if (count($deleteDirecciones) > 0) {
            foreach ($deleteDirecciones as $deleteDireccion) {
                Direccion::findOrFail($deleteDireccion->id)->delete();
            }
        }

        //actualizar direcciones
        if (count($updateDirecciones) > 0) {
            foreach ($updateDirecciones as $updateDireccion) {
                $direccion = array(
                    'localidad_id' => $updateDireccion->localidad_id,
                    'calle'        => $updateDireccion->calle,
                    'altura'       => $updateDireccion->altura,
                    'piso'         => $updateDireccion->piso,
                    'dpto'         => $updateDireccion->dpto,
                    'entrecalles'  => $updateDireccion->entrecalles);

                Direccion::findOrFail($updateDireccion->id)->update($direccion);
            }
        }

        //crear direcciones
        if (count($createDirecciones) > 0) {
            foreach ($createDirecciones as $createDireccion) {
                $direccion = array(
                    'cliente_id'   => $id,
                    'localidad_id' => $createDireccion->localidad_id,
                    'calle'        => $createDireccion->calle,
                    'altura'       => $createDireccion->altura,
                    'piso'         => $createDireccion->piso,
                    'dpto'         => $createDireccion->dpto,
                    'entrecalles'  => $createDireccion->entrecalles);

                Direccion::create($direccion);
            }
        }

        //sincronizar descuentos
        $cliente->descuentos()->sync($descuentos);

        //actualizar datos de cliente
        $cliente->update($request->all());
        $request->session()->flash('success', 'Datos del cliente actualizado');

        return Response::json(['success' => true, 'url' => url("/cliente")]);
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
        Cliente::destroy($id);

        return redirect('cliente');
    }

    public function getClientesSuggestSearch(Request $request)
    {
        return Cliente::search($request->get('q'))->get();
    }

    public function getClientesInfo()
    {
        $cliente_id = Input::get('cliente_id');
        $cliente    = $this->cliente->findOrFail($cliente_id);
        $descuentos = $cliente->descuentos()->get();
        $direcciones = $this->direccion->getDirecciones($cliente_id);
        return Response::json([
            'descuentos'  => $descuentos,
            'direcciones' => $direcciones]);
    }

    public function getDescuentos($cliente_id)
    {
        $descuentos = $this->cliente->findOrFail($cliente_id);
        return Response::json($descuentos);
    }

    public function setDescuento(Request $request)
    {
        $cliente_id   = Input::get('cliente_id');
        $descuento_id = Input::get('descuento_id');
        $cliente      = $this->cliente->findOrFail($cliente_id);
        $cliente->descuentos()->attach($descuento_id);
        return Response::json(['success' => true]);
    }
}
