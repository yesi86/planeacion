<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Areas extends Model
{
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
}
