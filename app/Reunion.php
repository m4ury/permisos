<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reunion extends Model
{
    protected $fillable = ['inicio_reunion', 'fin_reunion', 'titulo_reunion', 'cuerpo_reunion', 'observaciones_reunion', 'categoria_id'] ;

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

}