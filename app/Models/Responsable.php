<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Responsable extends Authenticatable
{
    use HasFactory;

    protected $table = 'responsable';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'photo',
        'area_id',
        'delegado_id',
        'planeacion_id',
    ];

    /**
     * Ocultar atributos del modelo al serializar.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    //   relacion con el modelo role
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    // check de que si tenga el rol asignado en este caso 3
    public function getIsResponsableAttribute()
    {
        return $this->role_id === 3;
    }
}
