<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Unidad
 *
 * @property int $id
 * @property string|null $nombre
 * @property string|null $descripcion
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Unidad newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Unidad newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Unidad query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Unidad whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Unidad whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Unidad whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Unidad whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Unidad whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Unidad extends Model
{
    public function users(){
        return $this->hasMany(User::class);
    }
}
