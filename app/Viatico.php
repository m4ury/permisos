<?php

namespace App;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Model;

class Viatico extends Model
{
    protected $fillable = ['permiso_id', 'estado', 'pasajes'];


    public function permiso(){
        return $this->belongsTo(Permiso::class);
    }

    public function countDias($diaInicio, $diaFin)
    {
        $diferencia = new CarbonPeriod($diaInicio, $diaFin);
        return $diferencia->count();
    }
}
