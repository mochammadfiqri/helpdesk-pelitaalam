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
        'type_id',
        'priority_id',
        'category_id',
        'department_id',
    ];

    public function priority(): BelongsTo
    {
        return $this->belongsTo(Priorities::class, 'priority_id', 'id');
    }
}
