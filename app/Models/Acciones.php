<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Acciones extends Model
{
    protected $table = 'acciones';
    protected $fillable = ['objetivo_id', 'Folio', 'descripcion', 'capitulo'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($accion) {
            $nextId = self::max('id') + 1;
            $accion->Folio = 'AC-ITSX-' . str_pad($nextId, 4, '0', STR_PAD_LEFT);
        });
    }

    public function objetivo()
    {
        return $this->belongsTo(Objetivo::class, 'objetivo_id');
    }

    public function capitulo()
    {
        return $this->belongsTo(ObjetoGasto::class, 'capitulo', 'capitulo');
    }
    public function actividades()
    {
        return $this->hasMany(Actividad::class);
    }
}
