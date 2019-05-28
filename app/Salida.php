<?php

namespace App;

use function foo\func;
use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    protected $fillable = ['user_id', 'descripcion', 'dia_salida', 'hora_salida', 'hora_llegada'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}