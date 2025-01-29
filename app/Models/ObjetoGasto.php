<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ObjetoGasto extends Model
{
    protected $table = 'catalogo_objeto_gasto';
    protected $fillable = ['capitulo', 'partida', 'descripcion'];

    public function actividades()
    {
        return $this->hasMany(Actividad::class, 'capitulo')
            ->whereColumn('actividades.partida', 'catalogo_objeto_gasto.partida');
    }
}
