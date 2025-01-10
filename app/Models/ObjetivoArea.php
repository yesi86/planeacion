<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ObjetivoArea extends Model
{
    protected $table = "objetivo_areas";

    /**
     * Relación dinámica basada en el tipo de área.
     */
    public function area()
    {
        // Asegúrate de que el valor de tipo sea correcto
        switch ($this->tipo) {
            case 'area_superior':
                return $this->belongsTo(AreaSuperior::class, 'area_id');
            case 'area_responsable':
                return $this->belongsTo(AreaResponsable::class, 'area_id');
            case 'departamento':
                return $this->belongsTo(Departamento::class, 'area_id');
            case 'divisiones_carrera':
                return $this->belongsTo(DivisionCarrera::class, 'area_id');
            default:
                return null;  // Podrías devolver null o manejar otro caso por defecto.
        }
    }
}
