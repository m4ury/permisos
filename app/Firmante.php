<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Firmante extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function grupos(){
        return $this->belongsToMany(Grupo::class);
    }
}
