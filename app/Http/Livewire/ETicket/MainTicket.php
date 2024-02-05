<?php

namespace App\Http\Livewire\ETicket;

use Carbon\Carbon;
use App\Models\Tickets;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Exports\DatasetExport;
use App\Models\DatasetTickets;
use App\Imports\DatasetTicketImport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class MainTicket extends Component
{
    public $search, $ticket_id, $user_id, $file;
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $myTickets = true;
    public $assignTickets = true;
    public $discussions, $selectedDiscussion, $auth_id, $receiverInstance, $selectDiscussion;
    
    public function deleteDataset() {
        if (DatasetTickets::count() > 0) {
            try {
                DatasetTickets::truncate();
                return redirect()->to('/tickets')->with([
                    'toast_type' => 'success',
                    'toast_message' => 'Dataset berhasil dihapus.',
                ]);
            } catch (\Throwable $th) {
                return redirect()->to('/tickets')->with([
                    'toast_type' => 'error',
                    'toast_message' => 'Dataset gagal dihapus.',
                ]);
            }
        } else {
            return redirect()->to('/tickets')->with([
                'toast_type' => 'info',
                'toast_message' => 'Dataset sudah kosong.',
            ]);
        }
    }

    public function datasetExport() {
        $dataset = DatasetTickets::with('priority','category','department')->get();
        return Excel::download(new DatasetExport($dataset), 'dataset_' . Carbon::now()->timestamp . '.xlsx');
    }

    public function importDatasetTicket() {
        $this->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        try {
            Excel::import(new DatasetTicketImport, $this->file->getRealPath());
    
            return redirect('/dashboard')->with([
                'toast_type' => 'success',
                'toast_message' => 'Import Berhasil',
            ]);

        } catch (\Throwable $th) {
            return redirect('/tickets')->with([
                'toast_type' => 'error',
                'toast_message' => 'Import gagal, sesuaikan format sesuai template',
            ]);
        }
    }
    
    public function editTicket($ticket_id) {
        session(['editing_ticket' => $ticket_id]);
        return redirect()->to(route('edit_ticket', ['ticket_id' => $ticket_id]));
    }

    public function clearSearch() {
        $this->search = '';    
    }

    public function render()
    {
        $query = Tickets::query();

        // Filter berdasarkan subject
        $query->where('subject', 'like', '%' . $this->search . '%');

        // Filter berdasarkan role user
        if (Auth::user()->roles->contains('id', 1)) {
            // dd($query);
        } elseif (Auth::user()->roles->contains('id', 14)) {
            // User biasa hanya dapat melihat tiket yang mereka buat
            $query->where('user_id', Auth::user()->id);
        } else {
            // User biasa hanya dapat melihat tiket yang mereka buat
            $query->where(function ($query) {
                $query->where('user_id', Auth::user()->id)
                    ->orWhere('assign_to_id', Auth::user()->id); // Jika ingin memperbolehkan melihat tiket yang ditugaskan ke pengguna juga
            });
            // Filter berdasarkan kondisi "My Tickets" atau "Assign Tickets"
            if ($this->myTickets || $this->assignTickets) {
                $query->where(function ($query) {
                    // Kondisi "My Tickets"
                    if ($this->myTickets) {
                        $query->orWhere('user_id', Auth::user()->id);
                    }
    
                    // Kondisi "Assign Tickets"
                    if ($this->assignTickets) {
                        $query->orWhere('assign_to_id', Auth::user()->id);
                    }
                });
            } else {
                $query->where('id', '=', 0);
            }
        }
        $tickets = $query->orderBy('created_at', 'desc')->paginate(5);

        return view('livewire.e-ticket.main-ticket', [
            'tickets' => $tickets,
        ]);
    }
}
