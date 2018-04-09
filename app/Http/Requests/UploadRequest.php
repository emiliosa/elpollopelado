<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadRequest extends FormRequest
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
            'categoria_id' => 'required',
            'descripcion' => 'required',
            'moneda_id' => 'required',
            'precio_unitario' => 'required',
            'imagen' => 'image|mimes:jpg,jpeg,bmp,png|max:2000'
        ];
        return $rules;
    }
}
