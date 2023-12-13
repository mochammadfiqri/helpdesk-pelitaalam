<?php

namespace App\Observers;

use App\Models\Tickets;
use App\Models\User;

class TicketObserver
{
    public function creating(Tickets $ticket)
    {
        // Set nilai kolom 'email' jika 'user_id' sudah diatur
        if ($ticket->user_id) {
            $user = User::find($ticket->user_id);
            $ticket->email = $user->email;
        }
    }
}
