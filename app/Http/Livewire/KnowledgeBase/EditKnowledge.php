<?php

namespace App\Http\Livewire\KnowledgeBase;

use App\Models\Type;
use Livewire\Component;
use App\Models\KnowledgeBase;

class EditKnowledge extends Component
{
    public $title, $type_id, $details, $kb_id, $search;

    public function mount()
    {
        $this->kb_id = session('editing_kb_id');
        $this->loadKnowledgeDetails();
    }

    public function loadKnowledgeDetails()
    {
        $knowledge_base = KnowledgeBase::find($this->kb_id);

        if ($knowledge_base) {
            $this->title = $knowledge_base->title;
            $this->details = $knowledge_base->details;
            $this->type_id = $knowledge_base->type_id;
        } else {
            return redirect()->to('/knowledge-base');
        }
    }

    public function updateKnowledge()
    {
        // Lakukan validasi jika diperlukan

        KnowledgeBase::where('id', $this->kb_id)->update([
            'title' => $this->title,
            'type_id' => $this->type_id,
            'details' => $this->details,
        ]);

        return redirect()->to('/knowledge-base')->with([
            'toast_type' => 'success',
            'toast_message' => 'Berhasil Memperbaharui Knowledge',
        ]);
    }
    
    public function render()
    {
        $type = Type::all();

        return view('livewire.knowledge-base.edit-knowledge', [
            'type' => $type,
        ]);
    }
}
