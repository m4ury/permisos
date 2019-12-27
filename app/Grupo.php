<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Grupo
 *
 * @property int $id
 * @property string $grp_nombre
 * @property string|null $grp_descripcion
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Firmante[] $firmantes
 * @property-read int|null $firmantes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $usuarios
 * @property-read int|null $usuarios_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Grupo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Grupo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Grupo query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Grupo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Grupo whereGrpDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Grupo whereGrpNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Grupo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Grupo whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Grupo extends Model
{
    public function usuarios(){
        return $this->hasMany(User::class);
    }

    public function firmantes(){
        return $this->hasMany(Firmante::class);
    }
}
