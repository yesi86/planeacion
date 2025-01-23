<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = 'actividades';

    protected $fillable = ['accion_id', 'Folio', 'descripcion', 'capitulo', 'partida',];

    public function accion()
    {
        return $this->belongsTo(Acciones::class, 'accion_id');
    }

    public function catalogoObjetoGasto()
    {
        return $this->belongsTo(ObjetoGasto::class, ['capitulo', 'partida'], ['capitulo', 'partida']);
    }
}
