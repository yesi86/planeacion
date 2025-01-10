<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objetivo extends Model
{
    use HasFactory;

    protected $table = "objetivo";

    // Función para generar el Folio
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($objetivo) {
            $nextId = self::max('id') + 1;
            $objetivo->Folio = 'OBITS-' . str_pad($nextId, 4, '0', STR_PAD_LEFT);
        });
    }

    // Relación muchos a muchos con la tabla pivote `objetivo_areas`
    public function areas()
    {
        return $this->belongsToMany(ObjetivoArea::class, 'objetivo_areas', 'objetivo_id', 'area_id')
            ->withPivot('tipo');  // Incluye el campo 'tipo' de la tabla pivote
    }
}
