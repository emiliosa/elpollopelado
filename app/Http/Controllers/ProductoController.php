<?php

namespace App\Http\Controllers;

use App\Repositories\CategoriaRepository;
use App\Repositories\MonedaRepository;
use App\Repositories\ProductoRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests;
use App\Producto;


class ProductoController extends Controller
{

    protected $producto;
    protected $moneda;
    protected $categoria;

    public function __construct(ProductoRepository $producto, MonedaRepository $moneda, CategoriaRepository $categoria)
    {
        $this->producto = $producto;
        $this->moneda = $moneda;
        $this->categoria = $categoria;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $productos = $this->producto->getProductos();
        $estados = $this->producto->getEstados();
        return view('producto.index', compact('productos', 'estados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $monedas = $this->moneda->getMonedasCombo();
        $categorias = $this->categoria->getCategoriasCombo();
        $estados = $this->producto->getEstados();
        return view('producto.create', compact('monedas', 'categorias', 'estados'));
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
            'categoria_id' => 'required',
            'descripcion' => 'required',
            'moneda_id' => 'required',
            'precio_unitario' => 'required',
            'imagen' => 'image|mimes:jpeg,bmp,png|max:2000'
        ]);

        $requestData = $request->all();
        $filename = $request->imagen->store();
        $requestData->imagen = $filename;

        $this->producto->create($requestData);

        return redirect('producto');
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
        $producto = $this->producto->findOrFail($id);
        //$url = Storage::url($producto->imagen);
        //return "<img src='$url'>";
        return view('producto.show', compact('producto'));
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
        $producto = $this->producto->findOrFail($id);
        $monedas = $this->moneda->getMonedasCombo();
        $categorias = $this->categoria->getCategoriasCombo();
        return view('producto.edit', compact('producto', 'monedas', 'categorias'));
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
            'categoria_id' => 'required',
            'descripcion' => 'required',
            'moneda_id' => 'required',
            'precio_unitario' => 'required',
            'imagen' => 'image|mimes:jpeg,bmp,png|max:2000'
        ]);

        $requestData = $request->all();
        $categoria_id = $request['categoria_id'];
        $categoria = $this->categoria->findOrFail($categoria_id);
        $categoria_descripcion = $categoria['attributes']['descripcion'];
        $filename = str_replace(' ', '_', $categoria_descripcion . '_' . $requestData['descripcion'] . '.jpeg');
        if ($request->hasFile('imagen')){
            //Storage::disk('local')->put('/productos/' . $filename, File::get($file));
            $request->imagen->storeAs('public', $filename);
            $requestData['imagen'] = $filename;
            //return Storage::putFile('productos', $request->file('imagen'));
        }


        //$filename = $request->imagen->store('productos');
        //$requestData['imagen'] = $filename;

        $this->producto->findOrFail($id)->update($requestData);

        return redirect('producto');
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
        Producto::destroy($id);

        return redirect('producto');
    }
    
    public function getProductos()
    {
        $productos = $this->producto->getProductos();
        return Response::json($productos);
    }
}
