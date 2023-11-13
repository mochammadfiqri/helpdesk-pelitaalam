<?php

namespace App\Http\Livewire;

use App\Models\KnowledgeBase;
use App\Models\Type;
use Livewire\Component;

class Knowledge extends Component
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
        $this->resetModal();
        return redirect('/knowledge-base')->with([
            'toast_type' => 'success', // Jenis pesan (success, error, warning, info)
            'toast_message' => 'Berhasil Menambahkan Knowledge Base', // Isi pesan
        ]);
    }

    public function editKnowledge($kb_id) {
        $knowledge_base = KnowledgeBase::find($kb_id);
        if ($knowledge_base) {
            $this->kb_id = $knowledge_base->id;
            $this->title = $knowledge_base->title;
            $this->details = $knowledge_base->details;
            $this->type_id = $knowledge_base->type_id;
        } else {
            return redirect()->to('/knowledge-base');
        }
    }
    
    public function updateKnowledge() {
        $knowledge_base = KnowledgeBase::find($this->kb_id);
        $knowledge_base->title = $this->title;
        $knowledge_base->details = $this->details;
        $knowledge_base->type_id = $this->type_id;
        $knowledge_base->save();

        return redirect('/knowledge-base')->with([
            'toast_type' => 'success',
            'toast_message' => 'Berhasil Memperbaharui Knowledge Base',
        ]);
    }

    public function resetModal() {
        $this->reset();
        $this->details = '';
    }

    public function clearSearch()
    {
        $this->search = '';
    }

    public function render()
    {
        $knowledge_base = KnowledgeBase::all();
        $type = Type::all();

        return view('livewire.knowledge', [
            'knowledge_base' => $knowledge_base,
            'type' => $type,
        ]);
    }
}
