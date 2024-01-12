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

        $generallyCount = Tickets::where('priority_id', 1)->count();
        $lessUrgentCount = Tickets::where('priority_id', 2)->count();
        $urgentCount = Tickets::where('priority_id', 3)->count();
        $veryUrgentCount = Tickets::where('priority_id', 4)->count();

        return view('livewire.dashboard', [
            'newTicketCount' => $newTicketCount,
            'openTicketCount' => $openTicketCount,
            'closedTicketCount' => $closedTicketCount,
            'unassignedTicketCount' => $unassignedTicketCount,
            'generallyCount' => $generallyCount,
            'lessUrgentCount' => $lessUrgentCount,
            'urgentCount' => $urgentCount,
            'veryUrgentCount' => $veryUrgentCount,
        ]);
    }
}
