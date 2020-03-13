<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $fillable = ['tipo_nombre', 'tipo_descripcion'];

    public function paciente()
    {
        return $this->hasOne(Paciente::class);
    }
}
