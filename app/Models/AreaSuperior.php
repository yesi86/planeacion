<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AreaSuperior extends Model
{
    protected $table = 'area_superior';
    protected $fillable = ['nombre'];

    public function areasResponsables()
    {
        return $this->hasMany(AreaResponsable::class);
    }

    // relacion inversa con usuarios, para manejar relaciones
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_area_position');
    }
}
