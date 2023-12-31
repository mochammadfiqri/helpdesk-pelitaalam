<?php

namespace App\Http\Livewire\ETicket;

use App\Models\Tickets;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class MainTicket extends Component
{
    public $search, $ticket_id, $user_id;
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $myTickets = true;
    public $assignTickets = true;
    public $discussions, $selectedDiscussion, $auth_id, $receiverInstance, $selectDiscussion;
    
    public function editTicket($ticket_id) {

        session(['editing_ticket' => $ticket_id]);

        return redirect()->to(route('edit_ticket', ['ticket_id' => $ticket_id]));
        
    }

    public function render()
    {
        $query = Tickets::query();

        // Filter berdasarkan subject
        $query->where('subject', 'like', '%' . $this->search . '%');

        // Filter berdasarkan role user
        if (Auth::user()->role_id == 1) {
            // Admin dapat melihat semua tiket
        } else {
            // User biasa hanya dapat melihat tiket yang mereka buat
            $query->where('user_id', Auth::user()->id);
        }

        // Filter berdasarkan kondisi "My Tickets" atau "Assign Tickets"
        if ($this->myTickets || $this->assignTickets) {
            $query->where(function ($query) {
                // Kondisi "My Tickets"
                if ($this->myTickets) {
                    $query->orWhere('user_id', Auth::user()->id);
                }

                // Kondisi "Assign Tickets"
                if ($this->assignTickets) {
                    $query->orWhere('assigned_user_id', Auth::user()->id);
                }
            });
        } else {
            $query->where('id', '=', 0);
        }

        $tickets = $query->orderBy('created_at', 'desc')->paginate(5);

        return view('livewire.e-ticket.main-ticket', [
            'tickets' => $tickets,
        ]);
    }
}
