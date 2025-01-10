<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objetivo extends Model
{

    use HasFactory;
    protected $table = "objetivo";

    protected $fillable = [
        'descripcion',
        'area_superior_id',
        'area_responsable_id',
        'departamento_id',
        'divisiones_carrera_id',
    ];
}
