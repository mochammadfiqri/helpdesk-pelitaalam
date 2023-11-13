<?php

namespace App\Http\Livewire;

use App\Models\Statuses;
use Livewire\Component;

class Status extends Component
{
    public function render()
    {
        $status = Statuses::all();
        return view('livewire.status', [
            'status' => $status,
        ]);
    }
}
