<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KnowledgeBase extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'title',
        'details',
        'type_id',
    ];
    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }
}
