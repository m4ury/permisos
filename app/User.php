<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends \TCG\Voyager\Models\User
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'rut', 'apellido_paterno', 'apellido_materno',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function salidas(){
        return $this->hasMany(Salida::class);
    }

    public function permisos(){
        return $this->hasMany(Permiso::class);
    }

    public function cargo(){
        return $this->belongsTo(Cargo::class);
    }

    public function unidad(){
        return $this->belongsTo(Unidad::class);
    }
}
