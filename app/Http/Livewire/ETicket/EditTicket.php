<?php

namespace App\Http\Livewire\ETicket;

use App\Models\Type;
use App\Models\User;
use Livewire\Component;
use App\Models\Category;
use App\Models\Department;
use App\Models\Priorities;
use App\Models\Statuses;
use App\Models\Tickets;

class EditTicket extends Component
{
    public $ticket_key, $email, $subject, $details, $user_id, $assigned_user_id, $type_id, $priority_id, $status_id, $category_id, $department_id, $file;
    public $ticketId;
    
    public function mount()
    {
        $this->ticket_key = session('editing_ticket');
        // dd($this->ticket_key);
        $this->loadTicketEditing();
    }

    public function loadTicketEditing() {
        $ticket = Tickets::where('ticket_key', $this->ticket_key)->first();
        if ($ticket) {
            $this->ticketId = $ticket->id;
            $this->subject = $ticket->subject;
            $this->details = $ticket->details;
            $this->user_id = $ticket->user_id;
            $this->assigned_user_id = $ticket->assigned_user_id;
            $this->type_id = $ticket->type_id;
            $this->priority_id = $ticket->priority_id;
            $this->status_id = $ticket->status_id;
            $this->category_id = $ticket->category_id;
            $this->department_id = $ticket->department_id;
            $this->file = $ticket->file;
        }
    }

    public function updateTicket() {
        // Lakukan validasi jika diperlukan
        try {
            $ticket = Tickets::find($this->ticketId); 
            $ticket->subject = $this->subject;
            $ticket->details = $this->details;
            $ticket->user_id = $this->user_id;
            $ticket->assigned_user_id = $this->assigned_user_id;
            $ticket->type_id = $this->type_id;
            $ticket->priority_id = $this->priority_id;
            $ticket->status_id = $this->status_id;
            $ticket->category_id = $this->category_id;
            $ticket->department_id = $this->department_id;
            $ticket->file = $this->file;
    
            $ticket->save(); // Use save instead of update

            return redirect()->to('/tickets')->with([
                'toast_type' => 'success',
                'toast_message' => 'Berhasil Memperbaharui Ticket',
            ]);
        } catch (\Throwable $th) {
            return redirect()->to('/tickets')->with([
                'toast_type' => 'error',
                'toast_message' => 'Gagal Memperbaharui Ticket',
            ]);
        }

    }

    public function fresh() {
        $this->reset();
        $this->details = NULL;
    }

    public function render()
    {
        $user = User::where('role_id', '!=', '1')->get();
        $assignToUser = User::where('role_id', '!=', '2')->get();
        $priority = Priorities::all();
        $department = Department::all();
        $type = Type::all();
        $category = Category::all();
        $status = Statuses::all();
        
        return view('livewire.e-ticket.edit-ticket', [
            'user' => $user,
            'assignToUser' => $assignToUser,
            'priority' => $priority,
            'department' => $department,
            'type' => $type,
            'category' => $category,
            'status' => $status,
        ]);
    }
}
