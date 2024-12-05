<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DivisionCarrera extends Model
{
    protected $table = 'divisiones_carrera';
    protected $fillable = ['nombre', 'area_responsable_id'];


    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }
}
