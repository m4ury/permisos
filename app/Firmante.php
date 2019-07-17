<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Firmante extends Model
{
    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function grupos(){
        return $this->belongsToMany(Grupo::class);
    }
}
