<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Permiso;
use App\User;

class StorePermiso extends FormRequest
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
          'dia_inicio' => 'required|unique:permisos',
          /*'dia_fin' => 'required|after_or_equal:dia_inicio',*/
          'hora_inicio' => 'required',
          'hora_fin' => 'required|after_or_equal:hora_inicio',
          'descripcion' => 'required|min:5',
      ];
    }
}
