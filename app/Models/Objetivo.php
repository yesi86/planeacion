<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objetivo extends Model
{
    
    protected $table = "objetivos";
    // Definir los campos que son asignables masivamente
    protected $fillable = [
        'objetivo',
        'monto_asignado',
    ];


}
