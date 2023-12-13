<?php

namespace App\Http\Livewire\ETicket;

use App\Models\Tickets;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class MainTicket extends Component
{
    public $search, $ticket_id;
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public function editTicket($ticket_id) {
        session(['editing_ticket' => $ticket_id]);
        return redirect()->to(route('edit_ticket', ['ticket_id' => $ticket_id]));
    }

    public function render()
    {
        // $tickets = Tickets::search($this->search)
        //     ->orderBy('created_at', 'desc')
        //     ->paginate(5);

        $tickets = Tickets::where('subject', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc') // Sesuaikan dengan kolom dan urutan yang diinginkan
            ->paginate(5);

        // $tickets = Tickets::where('assignTo','!=', '1')
        //     ->orderBy('created_at', 'desc') // Sesuaikan dengan kolom dan urutan yang diinginkan
        //     ->paginate(5);

        return view('livewire.e-ticket.main-ticket', [
            'tickets' => $tickets,
        ]);
    }
}
