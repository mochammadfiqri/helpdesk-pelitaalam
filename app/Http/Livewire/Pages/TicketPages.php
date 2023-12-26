<?php

namespace App\Http\Livewire\Pages;

use App\Models\Type;
use App\Models\User;
use App\Models\Tickets;
use Livewire\Component;
use App\Models\Category;
use App\Models\Department;
use App\Models\DatasetTickets;

class TicketPages extends Component
{
    public $ticket_id, $name, $email, $subject, $details, $user_id, $type_id, $category_id, $department_id, $file;

    public function rules() {
        return [
            'email' => ['required', 'email', 'exists:users,email'],
            'subject' => ['required', 'unique:dataset_tickets'],
            'details' => ['required', 'unique:dataset_tickets'],
        ];
    }

    public function createTicket() { 
        

        // //Priority Predict
        $nb = naive_bayes();
        $dataset = DatasetTickets::all();
        $trainingData = $dataset->slice(0, floor(0.8 * count($dataset))); // 80% data latih
        foreach ($trainingData as $key => $value) {
            $nb->train($value->priority_id, tokenize($value->details));
        }
        //Probabilitas
        $predict_priority_id = $nb->predict(tokenize($this->details));
        $predictedPriority = array_search(max($predict_priority_id), $predict_priority_id);

        //Type Predict
        $nb = naive_bayes();
        $dataset = DatasetTickets::all();
        $trainingData = $dataset->slice(0, floor(0.8 * count($dataset)));
        foreach ($trainingData as $key => $value) {
            $nb->train($value->type_id, tokenize($value->details));
        }
        $predict_type_id = $nb->predict(tokenize($this->details));
        $predictedType = array_search(max($predict_type_id), $predict_type_id);

        //Category Predict
        $nb = naive_bayes();
        $dataset = DatasetTickets::all();
        $trainingData = $dataset->slice(0, floor(0.8 * count($dataset)));
        foreach ($trainingData as $key => $value) {
            $nb->train($value->category_id, tokenize($value->details));
        }
        $predict_category_id = $nb->predict(tokenize($this->details));
        $predictedCategory = array_search(max($predict_category_id), $predict_category_id);

        //Department Predict
        $nb = naive_bayes();
        $dataset = DatasetTickets::all();
        $trainingData = $dataset->slice(0, floor(0.8 * count($dataset)));
        foreach ($trainingData as $key => $value) {
            $nb->train($value->department_id, tokenize($value->details));
        }
        $predict_department_id = $nb->predict(tokenize($this->details));
        $predictedDepartment = array_search(max($predict_department_id), $predict_department_id);

        // $user = User::where('email', $this->email)->first();
        // $this->validate();
        // $data = [
        //     'user_id' => $user->id,
        //     'email' => $this->email,
        //     'priority_id' => "$predictedPriority",
        //     'department_id' => "$predictedDepartment",
        //     'type_id' => "$predictedType",
        //     'category_id' => "$predictedCategory",
        //     'subject' => $this->subject,
        //     'details' => $this->details,
        // ];

        // dd($data);

        try {
            $user = User::where('email', $this->email)->first();
            $this->validate();
            Tickets::create([
                'user_id' => $user->id,
                'email' => $this->email,
                'subject' => $this->subject,
                'details' => $this->details,
                'priority_id' => "$predictedPriority",
                'department_id' => "$predictedDepartment",
                'type_id' => "$predictedType",
                'category_id' => "$predictedCategory",
            ]);
            $this->fresh();
            return redirect()->to('/')->with([
                'toast_type' => 'success', // Jenis pesan (success, error, warning, info)
                'toast_message' => 'Berhasil Mengajukan Ticket', // Isi pesan
            ]);
        } catch (\Throwable $th) {
            return redirect()->to('/')->with([
                'toast_type' => 'error', // Jenis pesan (success, error, warning, info)
                'toast_message' => 'Gagal Mengajukan Ticket', // Isi pesan
            ]);
        }
    }

    public function fresh() {
        $this->reset();
        $this->details = NULL;
    }

    public function render()
    {
        $department = Department::where('id','!=', '1')->orderBy('name','asc')->get();
        $type = Type::orderBy('name','asc')->get();
        $category = Category::orderBy('name', 'asc')->get();


        return view('livewire.pages.ticket-pages', [
            'department' => $department,
            'type' => $type,
            'category' => $category,
        ]);
    }
}
