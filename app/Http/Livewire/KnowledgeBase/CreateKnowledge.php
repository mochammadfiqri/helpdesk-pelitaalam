<?php

namespace App\Http\Livewire\KnowledgeBase;

use App\Models\Type;
use Livewire\Component;
use App\Models\KnowledgeBase;

class CreateKnowledge extends Component
{
    public $title, $type_id, $details, $kb_id, $search;
    
    public function rules() {
        return [
            'title' => ['required'],
            'details' => ['required'],
        ];
    }

    public function createKnowledge() {
        $this->validate();
        KnowledgeBase::create([
            'title' => $this->title,
            'details' => $this->details,
            'type_id' => $this->type_id,
        ]);
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
        $type = Type::all();
        
        return view('livewire.knowledge-base.create-knowledge', [
            'type' => $type,
        ]);
    }
}
