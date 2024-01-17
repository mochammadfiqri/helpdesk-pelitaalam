<?php

namespace App\Http\Livewire\KnowledgeBase;

use App\Models\Category;
use App\Models\Type;
use Livewire\Component;
use App\Models\KnowledgeBase;

class CreateKnowledge extends Component
{
    public $title, $details, $kb_id, $search;
    public $selectedCategory = [];
    
    public function rules() {
        return [
            'title' => ['required'],
            'details' => ['required'],
        ];
    }

    public function createKnowledge() {
        // $data = [
        //     'title' => $this->title,
        //     'details' => $this->details,
        //     $this->selectedCategory
        // ];
        // dd($data);

        $this->validate();
        $newKB = KnowledgeBase::create([
            'title' => $this->title,
            'details' => $this->details,
        ]);
        $newKB->categories()->attach($this->selectedCategory);

        $this->fresh();
        return redirect()->to('/knowledge-base')->with([
            'toast_type' => 'success', // Jenis pesan (success, error, warning, info)
            'toast_message' => 'Berhasil Menambahkan Knowledge', // Isi pesan
        ]);
    }

    public function fresh() {
        $this->reset();
        $this->details = NULL;
    }

    public function render()
    {
        $category = Category::all();
        
        return view('livewire.knowledge-base.create-knowledge', [
            'category' => $category,
        ]);
    }
}
