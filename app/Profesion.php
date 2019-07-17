<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesion extends Model
{
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
