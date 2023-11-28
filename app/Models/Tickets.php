<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'details',
        'type_id',
    ];

    // tambahkan metode untuk menghandle ticket_id
    public static function boot()
    {
        parent::boot();

        static::creating(function ($ticket) {
            $ticket->ticket_id = 'TICK-' . strtoupper(uniqid());
        });
    }
}
