<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Firmante
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Grupo[] $grupos
 * @property-read int|null $grupos_count
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Firmante newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Firmante newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Firmante query()
 * @mixin \Eloquent
 */
class Firmante extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function grupos(){
        return $this->belongsToMany(Grupo::class);
    }
}
