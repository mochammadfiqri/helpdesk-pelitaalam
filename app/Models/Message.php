<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'sender_id',
        'receiver_id',
        'discussion_id',
        'read_at',
    ];

    protected $dates = [
        'read_at',
    ];

    public function ticket() {
        return $this->belongsTo(Tickets::class);
    }

    public function user() {
        return $this->belongsTo(User::class, 'sender_id');
    }

    // public function isRead():bool {
    //     return $this->read_at != null;
    // }
}
