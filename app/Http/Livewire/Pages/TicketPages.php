<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;

class TicketPages extends Component
{
    public $subject, $statuses, $details, $kb_id, $priorities;

    public function createTicket() {
        
    }

    public function render()
    {
        return view('livewire.pages.ticket-pages');
    }
}
