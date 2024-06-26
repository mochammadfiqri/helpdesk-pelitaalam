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
    public $search, $file, $dataset_id;
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $checkedPost = [];
    public $selectAll = false;

    public function importDatasetTicket() {
        $this->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new DatasetTicketImport, $this->file->getRealPath());
        // dd($import);

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

    public function editDataset($dataset_id) {
        // $this->dataset_id = $dataset_id;
        session(['editing_dataset' => $dataset_id]);
        return redirect()->to(route('edit_dataset', ['dataset_id' => $dataset_id]));
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
