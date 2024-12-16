<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AreaResponsable extends Model
{
    protected $table = 'area_responsable';
    protected $fillable = ['nombre', 'area_superior_id'];
    public function areaSuperior()
    {
        return $this->belongsTo(AreaSuperior::class);
    }

    public function departamentos()
    {
        return $this->hasMany(Departamento::class);
    }

    // relacion inversa con usuarios, para manejar relaciones
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_area_position');
    }
}
