<?php

namespace App\Models;

use Illuminate\Support\Str;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KnowledgeBase extends Model
{
    use HasFactory, Sluggable, Searchable;

    protected $fillable = [
        'title',
        'slug',
        'details',
    ];
    
    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'details' => $this->details,
            // 'type_id' => $this->type_id,
            // Add other relevant fields
        ];
    }

    public function searchableAs()
    {
        return 'knowledge-base';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    // public function category(): BelongsTo
    // {
    //     return $this->belongsTo(Category::class, 'kb_category', 'kb_id', 'category_id');
    // }

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($model) {
            // Check if the 'title' attribute has changed
            if ($model->isDirty('title')) {
                // Update the slug based on the new title
                $model->slug = Str::slug($model->title);
            }
        });
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'kb_category', 'kb_id', 'category_id');
    }
}
