<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reunion extends Model
{
    protected $fillable = ['dia_reunion', 'inicio_reunion', 'fin_reunion', 'titulo_reunion', 'cuerpo_reunion', 'observaciones_reunion', 'categoria_id'] ;

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

    //Scopes
    public function scopeTituloReunion($query, $titulo_reunion)
    {
        if($titulo_reunion)
            return $query->where('titulo_reunion', 'LIKE', "%$titulo_reunion%");
    }

    public function scopeDiaReunion($query, $dia_reunion)
    {
        if($dia_reunion)
            return $query->where('dia_reunion', 'LIKE', "%$dia_reunion%");
    }

    /*public function scopeCategoria($query, $nombre_categoria)
    {

        if($nombre_categoria)
            return $query->where('titulo_reunion', 'LIKE', "%$nombre_categoria%");
    }*/

}