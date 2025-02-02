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

    public function parent()
    {
        return $this->belongsTo(Areas::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Areas::class, 'parent_id');
    }

    public function objetivos()
    {
        return $this->belongsToMany(Objetivo::class, 'objetivo_areas', 'area_id', 'objetivo_id')
            ->withPivot('tipo')
            ->withTimestamps();
    }
}
