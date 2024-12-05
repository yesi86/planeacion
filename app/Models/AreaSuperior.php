<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AreaSuperior extends Model
{
    protected $table = 'area_superior';
    protected $fillable = ['nombre'];

    public function areasResponsables()
    {
        return $this->hasMany(AreaResponsable::class);
    }
}
