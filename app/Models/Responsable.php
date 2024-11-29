<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as AuthenticatableModel;
use Illuminate\Notifications\Notifiable;

class Responsable extends AuthenticatableModel
{
    use HasFactory, Notifiable;

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

    /**
     * Cast the "email_verified_at" attribute to a timestamp.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relación con el modelo Role
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // Verifica si el responsable tiene un rol específico (en este caso, rol 3)
    public function getIsResponsableAttribute()
    {
        return $this->role_id === 3;
    }

    /**
     * Obtiene la contraseña para la autenticación.
     */
    public function getAuthPassword()
    {
        return $this->password;
    }
}
