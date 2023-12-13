<?php

namespace App\Http\Livewire\ETicket;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\DatasetTickets;
use App\Imports\DatasetTicketImport;
use Maatwebsite\Excel\Facades\Excel;

class MainDataset extends Component
{
    public $search, $file;
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $checkedPost = [];
    public $selectAll = false;

    public function importDatasetTicket() {
        $this->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        // dd($this->file);
        Excel::import(new DatasetTicketImport, $this->file->getRealPath());

        return redirect('/tickets/dataset')->with([
            'toast_type' => 'success',
            'toast_message' => 'Import Berhasil',
        ]);
    }

    public function updatedSelectAll() {
        if ($this->selectAll) {
            // Menggunakan pluck secara langsung untuk mendapatkan array ID
            $this->checkedPost = DatasetTickets::pluck('id')->map(function ($id) {
                return (string) $id;
            })->all();
        } else {
            $this->checkedPost = [];
        }
    }

    public function resetModal() {
        $this->reset();
    }

    public function render()
    {
        $dataset = DatasetTickets::paginate(5);
        return view('livewire.e-ticket.main-dataset', [
            'dataset' => $dataset,
        ]);
    }
}
