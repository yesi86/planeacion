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

    // Relación con la tabla pivote
    public function objetivoAreas()
    {
        return $this->hasMany(ObjetivoArea::class, 'objetivo_id');
    }

    public function areas()
    {
        return $this->hasMany(ObjetivoArea::class, 'objetivo_id')->with('area');
    }


    // Relaciones dinámicas basadas en el tipo
    public function areaSuperiores()
    {
        return $this->hasManyThrough(AreaSuperior::class, ObjetivoArea::class, 'objetivo_id', 'id', 'id', 'area_id')
            ->where('objetivo_areas.tipo', 'area_superior');
    }

    public function areaResponsables()
    {
        return $this->hasManyThrough(AreaResponsable::class, ObjetivoArea::class, 'objetivo_id', 'id', 'id', 'area_id')
            ->where('objetivo_areas.tipo', 'area_responsable');
    }

    public function departamentos()
    {
        return $this->hasManyThrough(Departamento::class, ObjetivoArea::class, 'objetivo_id', 'id', 'id', 'area_id')
            ->where('objetivo_areas.tipo', 'departamento');
    }

    public function divisionesCarrera()
    {
        return $this->hasManyThrough(DivisionCarrera::class, ObjetivoArea::class, 'objetivo_id', 'id', 'id', 'area_id')
            ->where('objetivo_areas.tipo', 'divisiones_carrera');
    }
}
