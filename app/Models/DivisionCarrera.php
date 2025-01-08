<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DivisionCarrera extends Model
{
    protected $table = 'divisiones_carrera';
    protected $fillable = ['nombre', 'departamento_id'];


    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    // relacion inversa con usuarios, para manejar relaciones
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_area_position');
    }
}
