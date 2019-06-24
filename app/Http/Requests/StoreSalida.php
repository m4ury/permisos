<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSalida extends FormRequest
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

            'dia_salida' => 'required|after_or_equal:'.date(now('America/Santiago')),
            'hora_salida' => 'required',
            'hora_llegada' => 'required|after:hora_salida',
            'descripcion' => 'required|min:5',
        ];
    }
}
