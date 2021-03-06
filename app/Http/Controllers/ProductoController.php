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
use Intervention\Image\ImageManagerStatic as Image;
use Gloudemans\Shoppingcart\Facades\Cart;

use App\Http\Requests;
use App\Models\Producto;
use App\Models\ProductoPrecio;
use App\Models\Moneda;
use App\Http\Requests\ProductoRequest;

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

        return view('producto.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $monedas = Moneda::orderBy('denominacion', 'asc')->get();
        $categorias = $this->categoria->getCategoriasCombo();
        $estados = $this->producto->getEstados();

        return view('producto.create', compact('monedas', 'categorias', 'estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\ProductoRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ProductoRequest $request)
    {

        $requestData = $request->all();
        $idCategoria = $requestData['categoria_id'];
        $categoria = $this->categoria->findOrFail($idCategoria);

        if ($request->hasFile('imagen')) {
            $filenameImagenOriginal = str_replace(' ', '_', $categoria->descripcion . '_' . $requestData['descripcion'] . '.jpeg');
            $filenameImagenReducida = str_replace(' ', '_', $categoria->descripcion . '_' . $requestData['descripcion'] . '_small.jpeg');
            $imagenFile = $request->file('imagen');

            $imagenOriginal = Image::make($imagenFile->getrealPath());
            $imagenOriginal->resize(500, 400);
            $imagenOriginal->stream();
            Storage::disk('local')->put('public/' . $filenameImagenOriginal, (string)$imagenOriginal->encode());
            $requestData['imagen'] = $filenameImagenOriginal;

            $imagenReducida = Image::make($imagenFile->getrealPath());
            $imagenReducida->resize(120, 120);
            $imagenReducida->stream();
            Storage::disk('local')->put('public/' . $filenameImagenReducida, (string)$imagenReducida->encode());
        }

        $producto = $this->producto->create($requestData);
        $productoPrecio = new ProductoPrecio([
            'producto_id' => $producto->id,
            'precio_unitario' => $requestData['precio_unitario']]);
        $producto->productoPrecio()->save($productoPrecio);

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
        $monedas = Moneda::orderBy('denominacion', 'asc')->get();
        $categorias = $this->categoria->getCategoriasCombo();

        return view('producto.edit', compact('producto', 'monedas', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param App\Http\Requests\ProductoRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, ProductoRequest $request)
    {
        $requestData = $request->all();
        $idCategoria = $requestData['categoria_id'];
        $categoria = $this->categoria->findOrFail($idCategoria);

        if ($request->hasFile('imagen')) {
            $filenameImagenOriginal = str_replace(' ', '_', $categoria->descripcion . '_' . $requestData['descripcion'] . '.jpeg');
            $filenameImagenReducida = str_replace(' ', '_', $categoria->descripcion . '_' . $requestData['descripcion'] . '_small.jpeg');
            $imagenFile = $request->file('imagen');

            $imagenOriginal = Image::make($imagenFile->getrealPath());
            $imagenOriginal->resize(500, 400);
            $imagenOriginal->stream();
            Storage::disk('public')->put($filenameImagenOriginal, (string)$imagenOriginal->encode());
            $requestData['imagen'] = $filenameImagenOriginal;

            $imagenReducida = Image::make($imagenFile->getrealPath());
            $imagenReducida->resize(120, 120);
            $imagenReducida->stream();
            Storage::disk('public')->put($filenameImagenReducida, (string)$imagenReducida->encode());
        }

        $producto = $this->producto->findOrFail($id);
        $producto->update($requestData);

        $precioUnitarioNew = number_format(floatval($requestData['precio_unitario']), 2, '.', '');
        $precioUnitarioOld = $producto->productoPrecio->first()->precio_unitario;

        //si actualiza el precio
        if ($precioUnitarioNew !== $precioUnitarioOld) {
            $producto->productoPrecio()->delete();
            $productoPrecio = new ProductoPrecio([
                'producto_id' => $producto->id,
                'precio_unitario' => $requestData['precio_unitario']]);
            $producto->productoPrecio()->save($productoPrecio);
        }

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
