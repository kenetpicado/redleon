<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClienteUpdate extends FormRequest
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
            'nombre' => ['required', 'max:50', Rule::unique('clientes')->ignore($this->cliente_id)],
            'direccion' =>  ['required', 'max:80'],
            'telefono' => ['required', 'numeric', 'digits:8', Rule::unique('clientes')->ignore($this->cliente_id)],
            'cedula' => ['required', 'alpha_dash', 'min:16', 'max:16', Rule::unique('clientes')->ignore($this->cliente_id)],
        ];
    }
}
