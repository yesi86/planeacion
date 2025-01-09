<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Acciones extends Model
{
    protected $table = 'acciones';
    protected $fillable = [
        'accion',
        'objetivo_id', // Ajusta el nombre del campo relacionado
    ];

    public function planeacion(): HasOne {
       return $this->hasOne(planeacion::class);
    }
    public function actividades(){
        return $this->hasMany(Actividad::class);
    }
    public function objetivo() {
        return $this->belongsTo(Objetivo::class, 'objetivo_id');
    }

}
