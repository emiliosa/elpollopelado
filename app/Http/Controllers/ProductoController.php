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
        /*$productos = $this->producto->getProductos();
        $estados = $this->producto->getEstados();
        return view('producto.index', compact('productos', 'estados'));*/
        $productos = $this->producto->getProductos();
        return view('shop', compact('productos'));
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
        return view('producto.show', compact('producto'));
    }

    /**
     * Display the specified resource.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    /*public function show($slug)
    {
        $product = Producto::where('slug', $slug)->firstOrFail();
        $interested = Producto::where('slug', '!=', $slug)->get()->random(4);
        return view('product')->with(['product' => $product, 'interested' => $interested]);
    }*/

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
        $categoria_id = $requestData['categoria_id'];
        $categoria = $this->categoria->findOrFail($categoria_id);
        $categoria_descripcion = $categoria['attributes']['descripcion'];
        if ($request->hasFile('imagen')) {
            $filename_imagen_original = str_replace(' ', '_', $categoria_descripcion . '_' . $requestData['descripcion'] . '.jpeg');
            $filename_imagen_reducida = str_replace(' ', '_', $categoria_descripcion . '_' . $requestData['descripcion'] . '_small.jpeg');
            $imagen_file = $request->file('imagen');

            /*$imagen_original = $request->file('imagen');
            $imagen_original->storeAs('public', $filename_imagen_original);
            $requestData['imagen'] = $filename_imagen_original;
            $imagen_reducida = Image::make($imagen_original->getrealPath());*/

            $imagen_original = Image::make($imagen_file->getrealPath());
            $imagen_original->resize(500, 400, function ($constraint) {
                $constraint->aspectRatio();
            });
            $imagen_original->stream();
            Storage::disk('local')->put('public/' . $filename_imagen_original, (string)$imagen_original->encode());
            $requestData['imagen'] = $filename_imagen_original;

            $imagen_reducida = Image::make($imagen_file->getrealPath());
            $imagen_reducida->resize(120, 120, function ($constraint) {
                $constraint->aspectRatio();
            });
            $imagen_reducida->stream();
            Storage::disk('local')->put('public/' . $filename_imagen_reducida, (string)$imagen_reducida->encode());
        }
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
