<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acuerdo extends Model
{
    protected $fillable = ['descripcion_acuerdo', 'estado_acuerdo', 'expiracion_acuerdo', 'user_id', 'reunion_id'];

    public function reunion()
    {
        return $this->belongsTo(Reunion::class);
    }
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}