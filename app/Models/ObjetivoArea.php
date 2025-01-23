<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjetivoArea extends Model
{
    use HasFactory;

    protected $fillable = ['objetivo_id', 'area_id', 'tipo'];

    //este metodo es para saber si  un objetivo esta seleccionado a una area
    public static function isAreaAssignedToObjective($objetivoId, $areaId, $tipo)
    {
        return self::where('objetivo_id', $objetivoId)
            ->where('area_id', $areaId)
            ->where('tipo', $tipo)
            ->exists();
    }

    public function objetivo()
    {
        return $this->belongsTo(Objetivo::class, 'objetivo_id');
    }

    public function area()
    {
        return $this->belongsTo(Areas::class, 'area_id');
    }
}
