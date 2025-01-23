<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Acciones extends Model
{
    protected $table = 'acciones';
    protected $fillable = ['objetivo_area_id', 'Folio', 'descripcion', 'capitulo'];

    public function objetivoArea()
    {
        return $this->belongsTo(ObjetivoArea::class, 'objetivo_area_id');
    }

    public function catalogoObjetoGasto()
    {
        return $this->belongsTo(ObjetoGasto::class, 'capitulo', 'capitulo');
    }
    public function actividades()
    {
        return $this->hasMany(Actividad::class);
    }
}
