<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacuna extends Model
{
    protected $fillable = ['vacuna_fecha', 'paciente_id'];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function tipo()
    {
        return $this->belongsTo(Tipo::class);
    }

    /*public function scopeSearch($query, $q)
    {
        if ($q)
            return $query->where('paciente_rut', 'LIKE', "%$q%")
                ->orWhere('paciente_nombres', 'LIKE', "%$q%")
                ->orWhere('apellido_paterno', 'LIKE', "%$q%")
                ->orWhere('apellido_materno', 'LIKE', "%$q%");
    }*/
}
