<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    protected $fillable = ['user_id', 'descripcion', 'dia_salida', 'hora_salida', 'hora_llegada'];
}
