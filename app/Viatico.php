<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Viatico extends Model
{
    public function permiso(){
        return $this->belongsTo(Permiso::class);
    }
}
