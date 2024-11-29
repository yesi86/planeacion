<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as AuthenticatableModel;
use Illuminate\Notifications\Notifiable;

class Responsable extends AuthenticatableModel
{
    use HasFactory, Notifiable;

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

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relación polimórfica con roles.
     */
    public function roles()
    {
        return $this->morphToMany(Role::class, 'model', 'model_has_roles')->withTimestamps();
    }

    /**
     * Verificar si el responsable tiene un rol específico.
     */
    public function hasRole(string $roleName): bool
    {
        return $this->roles->contains('name', $roleName);
    }
}
