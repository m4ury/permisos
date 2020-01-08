<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\User
 *
 * @property int $id
 * @property int|null $role_id
 * @property int|null $grupo_id
 * @property int|null $profesion_id
 * @property string $name
 * @property string $email
 * @property string|null $anexo
 * @property string|null $celular
 * @property string|null $avatar
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property string|null $settings
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $rut
 * @property string $apellido_paterno
 * @property string $apellido_materno
 * @property int $activo
 * @property string|null $contrato
 * @property int|null $grado
 * @property int|null $cargo_id
 * @property int|null $unidad_id
 * @property-read \App\Cargo|null $cargo
 * @property mixed $locale
 * @property-read \App\Grupo|null $grupo
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Permiso[] $permisos
 * @property-read int|null $permisos_count
 * @property-read \App\Profesion|null $profesion
 * @property-read \TCG\Voyager\Models\Role|null $role
 * @property-read \Illuminate\Database\Eloquent\Collection|\TCG\Voyager\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Salida[] $salidas
 * @property-read int|null $salidas_count
 * @property-read \App\Unidad|null $unidad
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereActivo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAnexo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereApellidoMaterno($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereApellidoPaterno($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCargoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCelular($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereContrato($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereGrado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereGrupoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereProfesionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereSettings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUnidadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends \TCG\Voyager\Models\User
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'rut', 'apellido_paterno', 'apellido_materno', 'grupo_id'
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

    public function grupo(){
        return $this->belongsTo(Grupo::class);
    }   

    public function profesion(){
        return $this->belongsTo(Profesion::class);
    }

    public function reuniones()
    {
        return $this->belongsToMany(Reunion::class);
    }

    public function nombreCompleto($user_id){
        return strtoupper($this->name.' '.$this->apellido_paterno.' '.$this->apellido_materno);
    }
}