<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicioRequest extends FormRequest
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
            'inicio' => 'required',
            'tipo' => 'required',
            'operador' => 'required',
            'periodo' => 'required',
            'fecha_pago' => 'required',
            'monto' => 'required',
            'equipo_instalado' => 'required',
            'mac' => 'required',
            'velocidad' => 'required',
        ] +
            ($this->isMethod('POST')
                ? $this->store()
                : $this->update());
    }

    protected function store()
    {
        return ['cliente_id' => 'required'];
    }

    protected function update()
    {
        return [];
    }
}
