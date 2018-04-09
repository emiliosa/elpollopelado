<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\TipoDeCliente;
use App\Models\TipoDeIdentificacion;
use App\Rules\CuitRule;

class ClienteRequest extends FormRequest
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
        //$usuario = Auth::user();
        $cliente_id = $this->request->get('cliente_id');

        switch ($this->method()) {
            case 'POST': //store
                $emailUniqueRule = 'unique:cliente,email';
                $razonSocialUniqueRule = 'unique:cliente,razon_social';
                $dniUniqueRule = 'unique:cliente,identificacion';
                $cuitUniqueRule = 'unique:cliente,identificacion';
                break;
            case 'PUT': //update
            case 'PATCH':
                $emailUniqueRule = Rule::unique('cliente', 'email')->ignore($this->request->get('email'), 'email');
                $razonSocialUniqueRule = Rule::unique('cliente', 'razon_social')->ignore($this->request->get('razon_social'), 'razon_social');
                $dniUniqueRule = Rule::unique('cliente', 'identificacion')->ignore($this->request->get('identificacion'), 'identificacion');
                $cuitUniqueRule = 'unique:cliente,identificacion';
                break;
        }

        $rules = [
            'tipo_cliente_id'        => ['required'],
            'tipo_identificacion_id' => ['required'],
            'email'                  => ['required', 'email', 'max:191', $emailUniqueRule],
            'telefono_celular'       => ['required', 'max:191'],
            'telefono_fijo'          => ['required', 'max:191'],
        ];

        if ($this->request->get('tipo_cliente_id') == TipoDeCliente::PERSONA_FISICA) {
            $rules['nombre'] = ['required', 'alpha', 'max:191'];
            $rules['apellido'] = ['required', 'alpha', 'max:191'];
        } else {
            $rules['razon_social'] = ['required', 'alpha_dash', 'max:191', $razonSocialUniqueRule];
        }

        if ($this->request->get('tipo_identificacion_id') == TipoDeIdentificacion::DNI) {
            $rules['identificacion'] = ['required', 'digits:8', $dniUniqueRule];
        } else {
            $rules['identificacion'] = ['required', new CuitRule(), $cuitUniqueRule];
        }

        return $rules;
    }
}
