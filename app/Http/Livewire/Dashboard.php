<?php

namespace App\Http\Livewire;

use App\Models\Tickets;
use Livewire\Component;
use App\Models\DatasetTickets;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    public $datasets, $totalDataset, $latestDataset;

    public function render()
    {
        $openTicketCount = Tickets::where('status_id', 1)->count();
        $inProgressTicketCount = Tickets::where('status_id', 2)->count();
        $closedTicketCount = Tickets::where('status_id', 3)->count();
        $rejectORcanceledTicketCount = Tickets::where('status_id', [4,5])->count();

        $lowCount = Tickets::where('priority_id', 1)->count();
        $normalCount = Tickets::where('priority_id', 2)->count();
        $highCount = Tickets::where('priority_id', 3)->count();
        $criticalCount = Tickets::where('priority_id', 4)->count();

        $datasets = DatasetTickets::select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as count'))
                    ->groupBy(DB::raw('MONTH(created_at)'))
                    ->orderBy(DB::raw('MONTH(created_at)'))
                    ->get();
        $datasetsArray = [];
        foreach ($datasets as $row) {
            $datasetsArray[] = $row->count;
        }
        $this->datasets = json_encode($datasetsArray);

        $this->latestDataset = DatasetTickets::latest('updated_at')->first();
        $this->totalDataset = $this->latestDataset ? $this->latestDataset->count() : 0;

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
