<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // relaciones para area, puestos...
    public function areasResponsables()
    {
        return $this->belongsToMany(AreaResponsable::class, 'user_area_position');
    }

    public function areasSuperiores()
    {
        return $this->belongsToMany(AreaSuperior::class, 'user_area_position');
    }

    public function departamentos()
    {
        return $this->belongsToMany(Departamento::class, 'user_area_position');
    }

    public function divisiones()
    {
        return $this->belongsToMany(DivisionCarrera::class, 'user_area_position');
    }
}
