<?php

namespace App\Http\Livewire\Plugins;

use App\Models\Tickets;
use Carbon\Carbon;
use Livewire\Component;

class Notification extends Component
{
    public $notif;

    public function markAsRead ($id) {
        // dd($id);
        $ticket = Tickets::findOrFail($id);
        $ticket->read_at = Carbon::now();
        $ticket->save();

        return redirect('/tickets');
        // session(['editing_ticket' => $ticket_id]);
        // return redirect()->to(route('edit_ticket', ['ticket_id' => $ticket_id]));
    }

    public function render()
    {
        $this->notif = Tickets::whereNull('read_at')->orderBy('created_at', 'desc')->limit(3)->get();

        return view('livewire.plugins.notification');
    }
}
