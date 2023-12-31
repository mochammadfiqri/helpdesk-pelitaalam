<?php

namespace App\Http\Livewire\ETicket;

use App\Models\Type;
use App\Models\User;
use App\Models\Tickets;
use Livewire\Component;
use App\Models\Category;
use App\Models\Department;
use App\Models\Priorities;
use App\Models\DatasetTickets;

class CreateTicket extends Component
{
    public $ticket_key, $name, $email, $subject, $details, $user_id, $assigned_user_id, $type_id, $priority_id;
    public $status_id, $category_id, $department_id, $sender_id, $receiver_id, $file;

    public function rules() {
        return [
            'user_id' => ['required'],
            // 'priority_id' => ['required'],
            // 'department_id' => ['required'],
            // 'type_id' => ['required'],
            // 'category_id' => ['required'],
            'subject' => ['required'],
            'details' => ['required'],
        ];
    }
    
    public function mount() {
        $this->fill(['user_id' => auth()->user()->email]);
    }

    public function createTicket() { 
        // //Priority Predict
        $nb = naive_bayes();
        $dataset = DatasetTickets::all();
        // Bagi data menjadi data latih (training) dan data uji (testing)
        $trainingData = $dataset->slice(0, floor(0.8 * count($dataset))); // 80% data latih
        // Latih model dengan data latih
        foreach ($trainingData as $key => $value) {
            $nb->train($value->priority_id, tokenize($value->details));
        }
        //Probabilitas
        $predict_priority_id = $nb->predict(tokenize($this->details));
        // Ubah output prediksi menjadi nama priority
        // $priorityName = Priorities::pluck('name', 'id');
        $predictedPriority = array_search(max($predict_priority_id), $predict_priority_id);
        // $predictedPriorityName = $priorityName[$predictedPriority];
        // Tampilkan hasil prediksi
        // dd($predictedPriorityName);

        //Type Predict
        $nb = naive_bayes();
        $dataset = DatasetTickets::all();
        $trainingData = $dataset->slice(0, floor(0.8 * count($dataset)));
        foreach ($trainingData as $key => $value) {
            $nb->train($value->type_id, tokenize($value->details));
        }
        $predict_type_id = $nb->predict(tokenize($this->details));
        $predictedType = array_search(max($predict_type_id), $predict_type_id);
        // Tampilkan hasil prediksi
        // dd($predictedTypeName);

        //Category Predict
        $nb = naive_bayes();
        $dataset = DatasetTickets::all();
        $trainingData = $dataset->slice(0, floor(0.8 * count($dataset)));
        foreach ($trainingData as $key => $value) {
            $nb->train($value->category_id, tokenize($value->details));
        }
        $predict_category_id = $nb->predict(tokenize($this->details));
        $predictedCategory = array_search(max($predict_category_id), $predict_category_id);
        // Tampilkan hasil prediksi
        // dd($predictedCategoryName);

        //Department Predict
        $nb = naive_bayes();
        $dataset = DatasetTickets::all();
        $trainingData = $dataset->slice(0, floor(0.8 * count($dataset)));
        foreach ($trainingData as $key => $value) {
            $nb->train($value->department_id, tokenize($value->details));
        }
        $predict_department_id = $nb->predict(tokenize($this->details));
        $predictedDepartment = array_search(max($predict_department_id), $predict_department_id);
        // Tampilkan hasil prediksi
        // dd($predictedDepartmentName);

        $this->validate();
        Tickets::create([
            'email' => auth()->user()->email,
            'subject' => $this->subject,
            'details' => $this->details,
            'user_id' =>auth()->user()->id,
            'assigned_user_id' => $this->assigned_user_id,
            'priority_id' => "$predictedPriority",
            'department_id' => "$predictedDepartment",
            'type_id' => "$predictedType",
            'category_id' => "$predictedCategory",
        ]);
        $this->fresh();
        return redirect()->to('/tickets')->with([
            'toast_type' => 'success', // Jenis pesan (success, error, warning, info)
            'toast_message' => 'Berhasil Menambahkan Tickets', // Isi pesan
        ]);
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

        return view('livewire.e-ticket.create-ticket', [
            'user' => $user,
            'assignToUser' => $assignToUser,
            'priority' => $priority,
            'department' => $department,
            'type' => $type,
            'category' => $category,
        ]);
    }
}
