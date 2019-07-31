<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $fillable = ['user_id', 'descripcion', 'incluye_viatico', 'lugar', 'dia_inicio', 'hora_inicio', 'hora_fin', 'comuna', 'movilizacion', 'created_at', 'updated_at'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function viatico(){
        return $this->hasOne(Viatico::class);
    }

    public function crearConViatico($permiso_id){
        $viatico = new Viatico;
        $viatico->save([
            $viatico->permiso_id = $permiso_id,
        ]);
    }
}
