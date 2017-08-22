<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('categoria', 'CategoriaController');
Route::resource('cliente', 'ClienteController');
Route::resource('descuento', 'DescuentoController');
Route::resource('descuento_por_cliente', 'DescuentoPorClienteController');
Route::resource('direccion', 'DireccionController');
Route::resource('direccion_por_cliente', 'DireccionPorClienteController');
Route::resource('localidad', 'LocalidadController');
Route::resource('moneda', 'MonedaController');
Route::resource('partido', 'PartidoController');
Route::resource('pedido', 'PedidoController');
Route::resource('pedido_detalle', 'PedidoDetalleController');
Route::resource('producto', 'ProductoController');
Route::resource('provincia', 'ProvinciaController');
Route::resource('tipo_de_cliente', 'TipoDeClienteController');
Route::resource('tipo_de_identificacion', 'TipoDeIdentificacionController');
Route::resource('unidad_de_venta', 'UnidadDeVentaController');

Route::get('/get_direccion', 'DireccionController@getDireccion');
Route::get('/get_provincias', 'ProvinciaController@getProvincias');
Route::get('/get_partidos_por_provincia', 'PartidoController@getPartidosPorProvincia');
Route::get('/get_localidades_por_partido', 'LocalidadController@getLocalidadesPorPartido');
Route::get('/get_descuentos', 'DescuentoController@getDescuentos');
Route::get('/get_descuento_por_cliente', 'DescuentoPorClienteController@getDescuentoPorCliente');
Route::get('/get_clientes_info', 'ClienteController@getClientesInfo');

Route::get('get_productos', 'ProductoController@getProductos');

// Carrito de compra
Route::resource('shop', 'ProductoController', ['only' => ['index', 'show']]);
Route::resource('cart', 'CartController');
Route::delete('emptyCart', 'CartController@emptyCart');
Route::post('switchToWishlist/{id}', 'CartController@switchToWishlist');
Route::resource('wishlist', 'WishlistController');
Route::delete('emptyWishlist', 'WishlistController@emptyWishlist');
Route::post('switchToCart/{id}', 'WishlistController@switchToCart');