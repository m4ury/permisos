<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $fillable = ['user_id', 'descripcion', 'viatico', 'tipo', 'lugar', 'dia_inicio', 'dia_fin', 'hora_inicio', 'hora_fin', 'viatico'];
}
