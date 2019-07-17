<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    public function usuarios(){
        return $this->hasMany(User::class);
    }

    public function firmantes(){
        return $this->belongsToMany(Firmante::class);
    }
}
