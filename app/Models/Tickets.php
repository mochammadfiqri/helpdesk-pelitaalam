<?php

namespace App\Models;

use Carbon\Carbon;
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
        'resolve_within',
        'respond_within',
        'user_id',
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
            $ticket->ticket_key = now()->format('Ymd') . '-' . self::generateTicketNumber();

        });

        static::created(function ($ticket) {
            if ($ticket->isDirty('respond_within') && $ticket->respond_within <= now()) {
                $ticket->status = 6;
            }
            
            if ($ticket->isDirty('resolve_within') && $ticket->resolve_within <= now()) {
                $ticket->status = 3;
            }
        });
    }

    public static function generateTicketNumber()
    {
        // Ambil nomor urut tiket terakhir dan tambahkan 1
        $lastTicket = self::orderBy('id', 'desc')->first();

        $number = $lastTicket ? intval(substr($lastTicket->ticket_key, -4)) + 1 : 1;

        // Format nomor urut menjadi panjang tetap, misalnya 4 digit
        return str_pad($number, 4, '0', STR_PAD_LEFT);
    }

    public function messages() {
        return $this->hasMany(Message::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
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