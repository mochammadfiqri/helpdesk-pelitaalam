<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DatasetTickets extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject',
        'details',
        'department_id',
        'priority_id',
        'category_id',
    ];

    public function priority(): BelongsTo
    {
        return $this->belongsTo(Priorities::class, 'priority_id', 'id');
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function department(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'department_id', 'id');
    }
}
