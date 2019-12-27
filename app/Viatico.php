<?php

namespace App;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Viatico
 *
 * @property int $id
 * @property string $estado
 * @property float $pasajes
 * @property float $valor
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $permiso_id
 * @property string|null $observacion
 * @property-read \App\Permiso $permiso
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Viatico newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Viatico newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Viatico query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Viatico whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Viatico whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Viatico whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Viatico whereObservacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Viatico wherePasajes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Viatico wherePermisoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Viatico whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Viatico whereValor($value)
 * @mixin \Eloquent
 */
class Viatico extends Model
{
    protected $fillable = ['permiso_id', 'estado', 'pasajes'];


    public function permiso(){
        return $this->belongsTo(Permiso::class);
    }

    public function countDias($diaInicio, $diaFin)
    {
        $diferencia = new CarbonPeriod($diaInicio, $diaFin);
        return $diferencia->count();
    }
}
