<?php

namespace App;

use function foo\func;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * App\Salida
 *
 * @property int $id
 * @property string|null $hora_salida
 * @property string|null $hora_llegada
 * @property string|null $dia_salida
 * @property string $descripcion
 * @property string $estado
 * @property string $tipo
 * @property int $horas_inicial
 * @property int|null $horas_ocupado
 * @property int|null $horas_saldo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $user_id
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salida newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salida newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salida query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salida whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salida whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salida whereDiaSalida($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salida whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salida whereHoraLlegada($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salida whereHoraSalida($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salida whereHorasInicial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salida whereHorasOcupado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salida whereHorasSaldo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salida whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salida whereTipo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salida whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Salida whereUserId($value)
 * @mixin \Eloquent
 */
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