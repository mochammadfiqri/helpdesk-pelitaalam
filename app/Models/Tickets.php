<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use App\Observers\TicketObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tickets extends Model
{
    use HasFactory, Searchable;

    protected $observer = TicketObserver::class;
    
    protected $fillable = [
        'ticket_key',
        'email',
        'subject',
        'details',
        'user_id',
        'assigned_user_id',
        'type_id',
        'priority_id',
        'status_id',
        'category_id',
        'department_id',
        'receiver_id',
        'sender_id',
        'file',
    ];

    public function toSearchableArray()
    {
        return [
            'subject' => $this->subject,
            'details' => $this->details,
        ];
    }

    public function searchableAs()
    {
        return 'tickets';
    }

    // tambahkan metode untuk menghandle ticket_key
    public static function boot()
    {
        parent::boot();

        static::creating(function ($ticket) {
            $ticket->ticket_key = 't-' . strtoupper(uniqid());
        });
    }

    public function messages() {
        return $this->hasMany(Message::class);
    }
    
    // public function getReceiver() {
    //     if ($this->sender_id === auth()->id()) {
    //         return User::firstWhere('id', $this->receiver_id);
    //     } else {
    //         return User::firstWhere('id', $this->sender_id);
    //     }
    // }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function assigned_user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_user_id', 'id');
    }

    public function priority(): BelongsTo
    {
        return $this->belongsTo(Priorities::class, 'priority_id', 'id');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Statuses::class, 'status_id', 'id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }
}