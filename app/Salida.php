<?php

namespace App;

use function foo\func;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Salida extends Model
{
    protected $fillable = ['user_id', 'descripcion', 'dia_salida', 'hora_salida', 'hora_llegada', 'horas_ocupado', 'horas_saldo', 'horas_inicial'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    function totalHorasMes($id){
        return Salida::whereMonth('dia_salida', '=', date('m'))
            ->whereUserId($id)
            ->sum('horas_ocupado');
    }
}