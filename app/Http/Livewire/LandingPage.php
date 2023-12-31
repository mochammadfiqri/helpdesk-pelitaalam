<?php

namespace App\Http\Livewire;

use App\Models\DatasetTickets;
use Livewire\Component;
use App\Models\KnowledgeBase;
use App\Models\Tickets;

class LandingPage extends Component
{
    public $search;
    public $knowledgeCount, $datasetCount, $ticketCount;

    public function mount()
    {
        $this->ticketCount = Tickets::count();
        $this->knowledgeCount = KnowledgeBase::count();
        $this->datasetCount = DatasetTickets::count();
    }

    public function render()
    {
        // $this->ticketCount = Tickets::count();

        if ($this->search) {
            $knowledge_base = KnowledgeBase::where('title', 'like', '%' . $this->search . '%')
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get();
        } else {
            $knowledge_base = collect();
        }
            
        return view('livewire.landing-page', [
            'knowledge_base' => $knowledge_base,
        ]); 
    }
}
