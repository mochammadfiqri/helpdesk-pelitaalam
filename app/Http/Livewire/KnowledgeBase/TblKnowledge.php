<?php

namespace App\Http\Livewire\KnowledgeBase;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\KnowledgeBase;

class TblKnowledge extends Component
{ 
    public function render()
    {
        return view('livewire.knowledge-base.tbl-knowledge');
    }
}
