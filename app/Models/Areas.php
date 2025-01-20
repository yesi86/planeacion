<?php
// app/Models/Areas.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Areas extends Model
{
    use HasFactory;

    protected $table = 'areas';
    protected $fillable = ['nombre', 'tipo', 'parent_id'];

    // Relación con el área superior (si aplica)
    public function parent()
    {
        return $this->belongsTo(Areas::class, 'parent_id');
    }

    // Relación con las áreas hijas (si aplica)
    public function children()
    {
        return $this->hasMany(Areas::class, 'parent_id');
    }

    // Relación con los objetivos asignados a esta área
    public function objetivos()
    {
        return $this->belongsToMany(Objetivo::class, 'objetivo_areas', 'area_id', 'objetivo_id')
            ->withPivot('tipo')
            ->withTimestamps();
    }
}
