<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReunion extends FormRequest
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
          'inicio_reunion' => 'required',
          'fin_reunion' => 'required|after_or_equal:inicio_reunion',
          'titulo_reunion' => 'required',
          'cuerpo_reunion' => 'required|min:5'
        ];
    }
}
