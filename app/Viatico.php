<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Viatico extends Model
{
    protected $fillable = ['permiso_id', 'estado', 'pasajes'];


    public function permiso(){
        return $this->belongsTo(Permiso::class);
    }
}
