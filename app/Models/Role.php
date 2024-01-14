<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    // public function users()
    // {
    //     return $this->belongsToMany(User::class, 'user_role', 'role_id', 'user_id');
    // }

    public function scopeSearch($query, $q)
    {
        return $query->where('name', 'LIKE', '%' . $q . '%');
    }
}
