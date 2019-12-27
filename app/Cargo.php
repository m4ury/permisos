<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Cargo
 *
 * @property int $id
 * @property string|null $nombre
 * @property string|null $descripcion
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Cargo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Cargo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Cargo query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Cargo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Cargo whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Cargo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Cargo whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Cargo whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Cargo extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
}
