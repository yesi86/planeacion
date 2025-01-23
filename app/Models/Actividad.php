<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = 'actividades';

    protected $fillable = ['accion_id', 'Folio', 'descripcion', 'capitulo', 'partida',];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($actividad) {
            $nextId = self::max('id') + 1;
            $actividad->Folio = 'ACTI-ITSX-' . str_pad($nextId, 4, '0', STR_PAD_LEFT);
        });
    }
    public function accion()
    {
        return $this->belongsTo(Acciones::class, 'accion_id');
    }

    public function catalogoObjetoGasto()
    {
        return $this->belongsTo(ObjetoGasto::class, ['capitulo', 'partida'], ['capitulo', 'partida']);
    }
}
