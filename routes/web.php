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

// Homepage Route
Route::get('/', 'WelcomeController@welcome')->name('welcome');

// phpinfo
Route::get('/phpinfo', function () {
    phpinfo();
});

// Authentication Routes
Auth::routes();

// Public Routes
Route::group(['middleware' => 'web'], function () {

    // Activation Routes
    Route::get('/activate', ['as' => 'activate', 'uses' => 'Auth\ActivateController@initial']);

    Route::get('/activate/{token}', ['as' => 'authenticated.activate', 'uses' => 'Auth\ActivateController@activate']);
    Route::get('/activation', ['as' => 'authenticated.activation-resend', 'uses' => 'Auth\ActivateController@resend']);
    Route::get('/exceeded', ['as' => 'exceeded', 'uses' => 'Auth\ActivateController@exceeded']);

    // Socialite Register Routes
    Route::get('/social/redirect/{provider}', ['as' => 'social.redirect', 'uses' => 'Auth\SocialController@getSocialRedirect']);
    Route::get('/social/handle/{provider}', ['as' => 'social.handle', 'uses' => 'Auth\SocialController@getSocialHandle']);

    // Route to for user to reactivate their user deleted account.
    Route::get('/re-activate/{token}', ['as' => 'user.reactivate', 'uses' => 'RestoreUserController@userReActivate']);
});

// Registered and Activated User Routes
Route::group(['middleware' => ['auth', 'activated']], function () {

    // Activation Routes
    Route::get('/activation-required', ['uses' => 'Auth\ActivateController@activationRequired'])->name('activation-required');
    Route::get('/logout', ['uses' => 'Auth\LoginController@logout'])->name('logout');

    //  Homepage Route - Redirect based on user role is in controller.
    Route::get('/home', ['as' => 'public.home', 'uses' => 'PedidoController@index']);

    // Show users profile - viewable by other users.
    Route::get('profile/{username}', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@show',
    ]);
});

// Registered, activated, and is current user routes.
Route::group(['middleware' => ['auth', 'activated', 'currentUser']], function () {

    // User Profile and Account Routes
    Route::resource(
        'profile',
        'ProfilesController', [
            'only' => [
                'show',
                'edit',
                'update',
                'create',
            ],
        ]
    );
    Route::put('profile/{username}/updateUserAccount', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@updateUserAccount',
    ]);
    Route::put('profile/{username}/updateUserPassword', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@updateUserPassword',
    ]);
    Route::delete('profile/{username}/deleteUserAccount', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@deleteUserAccount',
    ]);

    // Route to show user avatar
    Route::get('images/profile/{id}/avatar/{image}', [
        'uses' => 'ProfilesController@userProfileAvatar',
    ]);

    // Route to upload user avatar.
    Route::post('avatar/upload', ['as' => 'avatar.upload', 'uses' => 'ProfilesController@upload']);
});

// Registered, activated, and is admin routes.
Route::group(['middleware' => ['auth', 'activated', 'role:admin']], function () {
    Route::resource('/users/deleted', 'SoftDeletesController', [
        'only' => [
            'index', 'show', 'update', 'destroy',
        ],
    ]);

    Route::resource('users', 'UsersManagementController', [
        'names'  => [
            'index'   => 'users',
            'destroy' => 'user.destroy',
        ],
        'except' => [
            'deleted',
        ],
    ]);

    Route::resource('themes', 'ThemesManagementController', [
        'names' => [
            'index'   => 'themes',
            'destroy' => 'themes.destroy',
        ],
    ]);

    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
    Route::get('php', 'AdminDetailsController@listPHPInfo');
    Route::get('routes', 'AdminDetailsController@listRoutes');
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
Route::get('get_distancia', 'PedidoController@getDistancia');

// Carrito de compra
Route::resource('shop', 'ProductoController', ['only' => ['index', 'show']]);
Route::resource('cart', 'CartController');
Route::delete('emptyCart', 'CartController@emptyCart');
Route::post('switchToWishlist/{id}', 'CartController@switchToWishlist');
Route::resource('wishlist', 'WishlistController');
Route::delete('emptyWishlist', 'WishlistController@emptyWishlist');
Route::post('switchToCart/{id}', 'WishlistController@switchToCart');
