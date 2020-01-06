<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['descripcion_categoria', 'nombre_categoria'];

    public function reuniones()
    {
        return $this->hasMany(Reunion::class);
    }
}