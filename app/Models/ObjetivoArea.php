<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ObjetivoArea extends Model
{
    protected $table = "objetivo_areas";

    public function areas()
    {
        return match ($this->tipo) {
            'area_superior' => $this->belongsTo(AreaSuperior::class, 'area_id'),
            'area_responsable' => $this->belongsTo(AreaResponsable::class, 'area_id'),
            'departamento' => $this->belongsTo(Departamento::class, 'area_id'),
            'divisiones_carrera' => $this->belongsTo(DivisionCarrera::class, 'area_id'),
        };
    }
}
