<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use \Cart as Cart;
use Validator;

class CartController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });

        if (!$duplicates->isEmpty()) {
            $messageType = 'warning';
            $message = 'El producto ya existe';
        }else{
            $messageType = 'success';
            $message = 'Producto agregado';
            Cart::add($request->id, $request->descripcion, $request->qty ? $request->qty : 1, $request->precio_unitario)->associate('App\Models\Producto');
        }

        $request->session()->flash($messageType, $message);

        return redirect('pedido/create');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        // Validation on max quantity
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|between:1,15'
        ]);

         if ($validator->fails()) {
            session()->flash('error_message', 'Cantidad entre 1 y 15.');
            return response()->json(['success' => false, 'cart' => NULL]);
         }

        Cart::update($id, $request->quantity);
        $cart = ['subtotal' => Cart::instance('default')->subtotal(), 'total' => Cart::instance('default')->total()];

        return response()->json(['success' => true, 'msg' => 'La cantidad fue actualizada', 'cart' => $cart]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        $cart = ['subtotal' => Cart::instance('default')->subtotal(), 'total' => Cart::instance('default')->total()];

        return response()->json(['success' => true, 'msg' => 'El producto fue quitado', 'cart' => $cart]);
    }

    /**
     * Remove the resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function emptyCart()
    {
        Cart::destroy();
        return redirect('pedido/create')->withSuccessMessage('No hay productos seleccionados');
    }

    /**
     * Switch item from shopping cart to wishlist.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function switchToWishlist($id)
    {
        $item = Cart::get($id);

        Cart::remove($id);

        $duplicates = Cart::instance('wishlist')->search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });

        if (!$duplicates->isEmpty()) {
            return redirect('cart')->withSuccessMessage('Item is already in your Wishlist!');
        }

        Cart::instance('wishlist')->add($item->id, $item->name, 1, $item->price)
                                  ->associate('App\Product');

        return redirect('cart')->withSuccessMessage('Item has been moved to your Wishlist!');

    }
}
