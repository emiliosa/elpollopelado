<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;

class PedidoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'fecha_envio' => ['required', 'date_format:"d/m/Y H:i:s"'],
            'cliente_id'  => ['required',
                function ($attribute, $value, $fail) {
                    if (count(Cart::content()) == 0) {
                        return $fail('No hay productos en el pedido.');
                    }
                }],
            'direccion_envio_id' => ['required'],
        ];

        return $rules;
    }
}
