<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVacuna extends FormRequest
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
            'vacuna_fecha' => 'required',
            'paciente_rut' => 'cl_rut|required',
            'paciente_nombres' => 'required|min:3',
            'apellido_paterno' => 'required'
        ];
    }
}
