<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            //
            'nombre' => 'required|max:50',
            'direccion' => 'required|max:80',
            'telefono' => 'required|numeric|digits:8',
            'cedula' => 'required|alpha_dash|min:16|max:16',
        ];
    }
}
