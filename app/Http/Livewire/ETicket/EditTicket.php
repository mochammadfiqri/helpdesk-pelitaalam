<?php

namespace App\Http\Livewire\ETicket;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\Message;
use App\Models\Tickets;
use Livewire\Component;
use App\Models\Category;
use App\Models\Statuses;
use App\Models\Priorities;
use App\Models\TicketPhoto;
use App\Models\DatasetTickets;
use Illuminate\Support\Facades\Storage;

class EditTicket extends Component
{
    public $ticket_key, $email, $subject, $details, $user_id, $assign_to_id;
    public $type_id, $priority_id, $status_id, $category_id, $department_id, $sender_id, $receiver_id;
    public $file = [];
    public $ticketId;
    public $messages = [];
    public $newMessage, $sentMessage, $pushMessage;
    public $selectedDiscussion, $receiverInstance, $message, $messages_count;
    public $paginateVar = 10;
    public $discussionId;
    public $ticketPhoto;
    
    public function mount()
    {
        $this->ticket_key = session('editing_ticket');
        $this->loadTicketEditing();
    }

    public function loadTicketEditing() {
        
        $ticket = Tickets::where('ticket_key', $this->ticket_key)->first();

        $ticket->read_at = Carbon::now();
        $ticket->save();

        $this->messages_count = Message::where('discussion_id', $ticket->id)->count();
        $this->messages = Message::where('discussion_id', $ticket->id)
            ->skip($this->messages_count - $this->paginateVar)
            ->take($this->paginateVar)->get();

        // dd($this->messages_count, $this->message);
        if ($ticket) {
            $this->ticketId = $ticket->id;
            $this->subject = $ticket->subject;
            $this->details = $ticket->details;
            $this->user_id = $ticket->user_id;
            $this->priority_id = $ticket->priority_id;
            $this->status_id = $ticket->status_id;
            $this->category_id = $ticket->category_id;
            $this->department_id = $ticket->department_id;
            $this->assign_to_id = $ticket->assign_to_id;
            $this->file = $ticket->file;
        }
    }

    public function sendMessage() {
        if ($this->sentMessage == null) {
            return null;
        }

        $discussionId = Tickets::where('ticket_key', $this->ticket_key)->first();
         // Tentukan sender_id dan receiver_id berdasarkan peran pengguna saat ini
        $senderId = auth()->user()->id;
        // $receiverId = ($senderId == $discussionId->sender_id) ? $discussionId->user_id : $discussionId->sender_id;
        $receiverId = ($senderId == $discussionId->sender_id) ? $discussionId->department_id : $discussionId->user_id;

        Message::create([
            'discussion_id' => $discussionId->id,
            'sender_id' => $senderId,
            'receiver_id' => $receiverId,
            'body' => $this->sentMessage,
        ]);

        // update sender_id and receiver_id into the tickets table
        $ticket = Tickets::find($this->ticketId);
        $ticket->sender_id = $senderId;
        $ticket->receiver_id = $receiverId;
        $ticket->save();

        $this->emit('messageSended');
        $this->sentMessage = '';
        return redirect()->route('edit_ticket', ['ticket_id' => $this->ticket_key]);
    }
    
    public function updateTicket() {
        // Lakukan validasi jika diperlukan
        try {
            $ticket = Tickets::find($this->ticketId);
            $ticket->subject = $this->subject;
            $ticket->details = $this->details;
            $ticket->user_id = $this->user_id;
            $ticket->assign_to_id = $this->assign_to_id;
            $ticket->priority_id = $this->priority_id;
            $ticket->status_id = $this->status_id;
            $ticket->category_id = $this->category_id;
            $ticket->department_id = $this->department_id;
            $ticket->sender_id = $this->user_id;
            $ticket->receiver_id = $this->assign_to_id;
            // $ticket->file = $this->file;
    
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

    public function importToDataset() {
        try {
            $this->validate([
                'subject' => 'required|unique:dataset_tickets',
                'details' => 'required|unique:dataset_tickets',
            ]);
            
            DatasetTickets::create([
                'subject' => $this->subject,
                'details' => $this->details,
                'priority_id' => $this->priority_id,
                'department_id' => $this->department_id,
                'type_id' => $this->type_id,
                'category_id' => $this->category_id,
            ]);
            return redirect()->to('/tickets')->with([
                'toast_type' => 'success',
                'toast_message' => 'Berhasil Import Ticket ke Dataset',
            ]);
        } catch (\Throwable $th) {
            return redirect()->to('/tickets')->with([
                'toast_type' => 'error',
                'toast_message' => 'Gagal Import Ticket ke Dataset',
            ]);
        }
    }

    public function removeTicket() {
        // Temukan tiket berdasarkan ticket_key
        $ticket = Tickets::where('ticket_key', $this->ticket_key)->first();

        // Hapus tiket jika ditemukan
        if ($ticket) {
            // Hapus semua pesan terkait dengan tiket
            Message::where('discussion_id', $ticket->id)->delete();

            //hapus foto dari storage
            $ticketPhotos = TicketPhoto::where('ticket_id', $ticket->id)->get();
            $photoPaths = $ticketPhotos->pluck('file_path')->toArray();

            foreach ($photoPaths as $photoPath) {
                Storage::delete($photoPath);
            }

            // Hapus tiket
            $ticket->delete();

            return redirect()->to('/tickets')->with([
                'toast_type' => 'success',
                'toast_message' => 'Berhasil Menghapus Ticket',
            ]);
        }
    }

    public function fresh() {
        $this->reset();
        $this->details = NULL;
    }

    public function render()
    {
        $user = User::whereDoesntHave('roles', function ($query) {
            $query->where('roles.id', 1);
        })->get();

        $assignToUser = User::when($this->department_id, function ($query) {
            $query->whereHas('roles', function ($roleQuery) {
                $roleQuery->where('roles.id', $this->department_id);
            });
        })->get();;

        $priority = Priorities::all();
        $department = Role::where('id', '!=', 14)->get();
        $category = Category::all();
        $status = Statuses::all();

        $checkedDiscussion = Message::where('discussion_id', $this->discussionId)
            ->where(function ($query) {
                $query->where('sender_id', auth()->user()->id)
                    ->where('receiver_id', $this->user_id);
            })
            ->orWhere(function ($query) {
                $query->where('receiver_id', auth()->user()->id)
                    ->where('sender_id', $this->user_id);
            })
            ->orderBy('created_at', 'asc') // Sesuaikan dengan kolom timestamp yang sesuai
            ->get();

            $this->ticketPhoto = Tickets::where('ticket_key', $this->ticket_key)->first();
        return view('livewire.e-ticket.edit-ticket', [
            'checkedDiscussion' => $checkedDiscussion,
            'user' => $user,
            'assignToUser' => $assignToUser,
            'priority' => $priority,
            'department' => $department,
            'category' => $category,
            'status' => $status,
            // 'ticketPhoto' => $ticketPhoto,
        ]);
    }
}
