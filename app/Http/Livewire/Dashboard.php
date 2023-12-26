<?php

namespace App\Http\Livewire;

use App\Models\Tickets;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $newTicketCount = Tickets::where('status_id', 6)->count();
        $openTicketCount = Tickets::where('status_id', [2,3,4,5])->count();
        $closedTicketCount = Tickets::where('status_id', 1)->count();
        $unassignedTicketCount = Tickets::where('assigned_user_id', null)->count();
        return view('livewire.dashboard', [
            'newTicketCount' => $newTicketCount,
            'openTicketCount' => $openTicketCount,
            'closedTicketCount' => $closedTicketCount,
            'unassignedTicketCount' => $unassignedTicketCount,
        ]);
    }
}
