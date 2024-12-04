<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class planeacion extends Model
{
    protected $table='planeacion';
    protected $fillable = [
        'accion_id',
        
    ];

    public function accion():BelongsTo{
        return $this->belongsTo(Acciones::class);
    }
}
