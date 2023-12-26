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
    
    // protected $listeners = ['chatTicketSelected'];
    // public function chatTicketSelected(Tickets $discussion, $receiverId) {
    //     $this->selectedDiscussion = $discussion;
    //     $receiverInstance = Tickets::find($receiverId);
    // }

    // public function getChatUserInstance(Tickets $discussion, $request) {
    //     $this->auth_id = auth()->id();

    //     //get selected discussion
    //     if ($discussion->sender_id == $this->auth_id) {
    //         $this->receiverInstance = Tickets::firstWhere('id', $discussion->receiver_id);
    //     } else {
    //         $this->receiverInstance = Tickets::firstWhere('id', $discussion->sender_id);
    //     }

    //     if (isset($request)) {
    //         return $this->receiverInstance->$request;
    //     }
    // }

    public function editTicket($ticket_id) {
        
        // $this->call('chatTicketSelected', [
        //     'discussion' => Tickets::find($ticket_id),
        //     'receiverId' => $user_id,
        // ]);

        // si pembuat tiket bisa jadi receiver maupun sender
        // user_id itu adalah pembuat tiket

        // $this->ticket_id = $ticket_id;
        // $discussion = Tickets::where('ticket_key', $this->ticket_id)->first();

        session(['editing_ticket' => $ticket_id]);
        // session(['receiver_ticket' => $receiver_id]);

        return redirect()->to(route('edit_ticket', ['ticket_id' => $ticket_id]));
        // return redirect()->to(route('edit_ticket', ['ticket_id' => $ticket_id, 'receiver_id' => $receiver_id]));

        // $this->emitTo('e-ticket.edit-ticket', 'loadDiscussion', $discussion, $receiver_id);
        // dd($discussion, $receiver_id);
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
