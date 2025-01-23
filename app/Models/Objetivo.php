<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objetivo extends Model
{
    use HasFactory;

    protected $table = "objetivo";
    protected $fillable = ['descripcion'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($objetivo) {
            $nextId = self::max('id') + 1;
            $objetivo->Folio = 'OB-ITSX-' . str_pad($nextId, 4, '0', STR_PAD_LEFT);
        });
    }

    public function areas()
    {
        return $this->belongsToMany(Areas::class, 'objetivo_areas', 'objetivo_id', 'area_id')
            ->withPivot('tipo')
            ->withTimestamps();
    }


    public function getNumAreasAfectadasAttribute()
    {
        return $this->areas()->count();
    }
}
