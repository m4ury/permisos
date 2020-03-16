<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable = [
        'paciente_nombres', 'paciente_rut', 'apellido_paterno', 'apellido_materno', 'paciente_sexo', 'paciente_direccion', 'tipo_id', 'paciente_comuna', 'paciente_telefono', 'fecha_nacimiento'
    ];

    public function vacunas()
    {
        return $this->hasMany(Vacuna::class);
    }

    public function tipo()
    {
        return $this->belongsTo(Tipo::class);
    }
}
