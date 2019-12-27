<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Profesion
 *
 * @property int $id
 * @property string $profesion_nombre
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profesion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profesion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profesion query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profesion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profesion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profesion whereProfesionNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profesion whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Profesion extends Model
{
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
