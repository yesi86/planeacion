<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'departamento';
    protected $fillable = ['nombre', 'area_responsable_id'];

    public function areaResponsable()
    {
        return $this->belongsTo(AreaResponsable::class);
    }
    public function divisionesCarrera()
    {
        return $this->hasMany(DivisionCarrera::class);
    }
    // relacion inversa con usuarios, para manejar relaciones
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_area_position');
    }
}
