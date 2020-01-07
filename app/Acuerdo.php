<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acuerdo extends Model
{
    protected $fillable = ['descripcion_acuerdo', 'estado_acuerdo', 'expiracion_acuerdo', 'user_id'];

    public function reunion()
    {
        return $this->belongsTo(Categoria::class);
    }
}
