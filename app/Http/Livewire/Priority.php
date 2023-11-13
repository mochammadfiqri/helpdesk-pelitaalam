<?php

namespace App\Http\Livewire;

use App\Models\Priorities;
use Livewire\Component;

class Priority extends Component
{
    public function render()
    {
        $priority = Priorities::all();
        return view('livewire.priority', [
            'priority' => $priority,
        ]);
    }
}
