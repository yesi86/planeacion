<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAreaPosition extends Model
{
    use HasFactory;

    protected $table = 'user_area_position'; // Definir la tabla pivote

    protected $fillable = [
        'user_id',
        'area_id',
        'position_id',
        'role_id', // Si lo deseas también puedes agregar otros campos
    ];
}
