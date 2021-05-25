<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Events\ReunionCreada;

class Reunion extends Model
{
    protected $fillable = ['dia_reunion', 'inicio_reunion', 'fin_reunion', 'titulo_reunion', 'cuerpo_reunion', 'observaciones_reunion', 'categoria_id'];

    /*protected $events = [ 'creada' => ReunionCreada::class,

    ];*/

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function acuerdos()
    {
        return $this->hasMany(Acuerdo::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
