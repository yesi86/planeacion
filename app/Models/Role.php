<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'rol';
    protected $fillable = ['name'];


    public function models()
    {
        return $this->morphedByMany(User::class, 'model', 'model_has_roles')
            ->withTimestamps()
            ->union($this->morphedByMany(Responsable::class, 'model', 'model_has_roles'));
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'model_has_roles', 'role_id', 'model_id')->withTimestamps();
    }
}
