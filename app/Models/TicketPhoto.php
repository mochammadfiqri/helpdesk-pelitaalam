<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketPhoto extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'ticket_id',
        'file_path'
    ];

    public function ticket()
    {
        return $this->belongsTo(Tickets::class, 'ticket_id', 'id');
    }
}
