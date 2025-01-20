<?php

// app/Models/ObjetivoArea.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjetivoArea extends Model
{
    use HasFactory;

    protected $fillable = ['objetivo_id', 'area_id', 'tipo'];

    // Método para verificar si una área ya está asignada a un objetivo con un tipo específico
    public static function isAreaAssignedToObjective($objetivoId, $areaId, $tipo)
    {
        return self::where('objetivo_id', $objetivoId)
            ->where('area_id', $areaId)
            ->where('tipo', $tipo)
            ->exists();
    }
}
