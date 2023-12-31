<?php

namespace App\Http\Livewire\ETicket;

use App\Models\Type;
use Livewire\Component;
use App\Models\Category;
use App\Models\Department;
use App\Models\Priorities;
use App\Models\DatasetTickets;

class EditDataset extends Component
{
    public $datasetId, $subject, $details, $department_id, $type_id, $priority_id, $category_id;

    public function mount()
    {
        $this->datasetId = session('editing_dataset');
        $this->loadDataset();
    }

    public function loadDataset() {
        $dataset = DatasetTickets::where('id', $this->datasetId)->first();
        // dd($dataset);
        if ($dataset) {
            $this->datasetId = $dataset->id;
            $this->subject = $dataset->subject;
            $this->details = $dataset->details;
            $this->department_id = $dataset->department_id;
            $this->type_id = $dataset->type_id;
            $this->priority_id = $dataset->priority_id; 
            $this->category_id = $dataset->category_id;
        } else {
            return redirect()->to('/tickets/dataset');
        }
    }

    public function render()
    {
        $priority = Priorities::all();
        $department = Department::all();
        $type = Type::all();
        $category = Category::all();
        
        return view('livewire.e-ticket.edit-dataset', [
            'priority' => $priority,
            'department' => $department,
            'type' => $type,
            'category' => $category,
        ]);
    }
}
