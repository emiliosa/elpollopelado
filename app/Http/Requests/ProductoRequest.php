<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CurrencyRule;

class ProductoRequest extends FormRequest
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
        return [
            'categoria_id' => ['required'],
            'descripcion' => ['required'],
            'moneda_id' => ['required'],
            'precio_unitario' => ['required', new CurrencyRule(), 'min:0.01'],
            'stock' => ['required', 'numeric', 'min:0']
        ];
    }
}
