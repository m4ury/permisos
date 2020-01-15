<?php

namespace App;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Permiso
 *
 * @property int $id
 * @property int|null $correlativo
 * @property string|null $hora_inicio
 * @property string|null $hora_fin
 * @property string|null $dia_inicio
 * @property string|null $dia_fin
 * @property string $descripcion
 * @property string|null $organizador
 * @property string $estado
 * @property int $incluye_viatico
 * @property int $es_capacitacion
 * @property string|null $movilizacion
 * @property string|null $lugar
 * @property string|null $comuna
 * @property string|null $doc_informacion
 * @property string $tipo
 * @property int|null $horas_solicitadas
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $user_id
 * @property-read \App\User $user
 * @property-read \App\Viatico $viatico
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permiso newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permiso newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permiso query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permiso whereComuna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permiso whereCorrelativo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permiso whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permiso whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permiso whereDiaFin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permiso whereDiaInicio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permiso whereDocInformacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permiso whereEsCapacitacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permiso whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permiso whereHoraFin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permiso whereHoraInicio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permiso whereHorasSolicitadas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permiso whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permiso whereIncluyeViatico($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permiso whereLugar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permiso whereMovilizacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permiso whereOrganizador($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permiso whereTipo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permiso whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permiso whereUserId($value)
 * @mixin \Eloquent
 */
class Permiso extends Model
{
    protected $fillable = ['user_id', 'descripcion', 'incluye_viatico', 'es_capacitacion', 'lugar', 'dia_inicio', 'hora_inicio', 'hora_fin', 'comuna', 'movilizacion', 'created_at', 'updated_at', 'organizador', 'doc_informacion', 'dia_fin'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function viatico()
    {
        return $this->hasOne(Viatico::class);
    }

    public function crearConViatico($permiso_id)
    {
        $viatico = new Viatico;
        $viatico->save([
            $viatico->permiso_id = $permiso_id,
            /*$viatico->observacion*/
        ]);
    }

    public function fechasDesdeRango($diaInicio, $diaFin)
    {
        $periodo = CarbonPeriod::create($diaInicio, $diaFin);
        $p = array();

        foreach ($periodo as $date) {
            $p[] = Carbon::parse($date)->format('d/m/Y');
        }

        return preg_replace("!([\b\t\n\r\f\"\\'])!", "\\\\\\1", $p);
    }

    //Query Scope

    /*public function scopeDia($query, $dia)
    {
        if($dia)
            return $query->where('dia_inicio', 'LIKE', "%$dia%");
    }*/

    public function scopeDescripcion($query, $descripcion)
    {
        if($descripcion)
            return $query->where('descripcion', 'LIKE', "%$descripcion%");
    }
}
