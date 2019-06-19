<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $fillable = ['user_id', 'descripcion', 'viatico', 'lugar', 'dia_inicio', 'dia_fin', 'hora_inicio', 'hora_fin', 'viatico', 'movilizacion'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
