<?php

namespace App\Http\Livewire;

use App\Models\Tickets;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $openTicketCount = Tickets::where('status_id', 1)->count();
        $inProgressTicketCount = Tickets::where('status_id', 2)->count();
        $closedTicketCount = Tickets::where('status_id', 3)->count();
        $rejectORcanceledTicketCount = Tickets::where('assigned_user_id', [4,5])->count();

        $lowCount = Tickets::where('priority_id', 1)->count();
        $normalCount = Tickets::where('priority_id', 2)->count();
        $highCount = Tickets::where('priority_id', 3)->count();
        $criticalCount = Tickets::where('priority_id', 4)->count();

        return view('livewire.dashboard', [
            'openTicketCount' => $openTicketCount,
            'inProgressTicketCount' => $inProgressTicketCount,
            'closedTicketCount' => $closedTicketCount,
            'rejectORcanceledTicketCount' => $rejectORcanceledTicketCount,
            'lowCount' => $lowCount,
            'normalCount' => $normalCount,
            'highCount' => $highCount,
            'criticalCount' => $criticalCount,
        ]);
    }
}
