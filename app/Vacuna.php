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
}
