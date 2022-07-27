<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CobradorRequest extends FormRequest
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
        return ['nombre' => 'required'] +

            ($this->isMethod('POST')
                ? $this->store()
                : $this->update());
    }

    protected function store()
    {
        return ['usuario' => 'required|alpha_dash|unique:cobradors|unique:users,email'];
    }

    protected function update()
    {
        return ['nombre' => ['required', 'alpha_dash', Rule::unique('users')->ignore(auth()->user()->id)]];
    }
}
