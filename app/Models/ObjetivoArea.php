<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ObjetivoArea extends Model
{
    protected $table = "objetivo_areas";
    protected $fillable = ['objetivo_id', 'area_id', 'tipo'];

    public function objetivo()
    {
        return $this->belongsTo(Objetivo::class, 'objetivo_id');
    }

    public function area()
    {
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
                return null;
        }
    }
}
