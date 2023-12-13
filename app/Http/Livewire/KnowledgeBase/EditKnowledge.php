<?php

namespace App\Http\Livewire\KnowledgeBase;

use App\Models\Type;
use Livewire\Component;
use App\Models\KnowledgeBase;

class EditKnowledge extends Component
{
    public $title, $type_id, $details, $slug, $kb_id, $search;

    public function mount()
    {
        $this->slug = session('editing_kb_slug');
        $this->loadKnowledgeDetails();
    }

    public function loadKnowledgeDetails()
    {
        $knowledge_base = KnowledgeBase::where('slug', $this->slug)->first();
        if ($knowledge_base) {
            $this->kb_id = $knowledge_base->id;
            $this->title = $knowledge_base->title;
            $this->slug = $knowledge_base->slug;
            $this->details = $knowledge_base->details;
            $this->type_id = $knowledge_base->type_id;
        } else {
            return redirect()->to('/knowledge-base');
        }
    }

    public function updateKnowledge()
    {
        // Lakukan validasi jika diperlukan

        $knowledgeBase = KnowledgeBase::find($this->kb_id);
        $knowledgeBase->title = $this->title;
        $knowledgeBase->slug = $this->slug;
        $knowledgeBase->type_id = $this->type_id;
        $knowledgeBase->details = $this->details;

        $knowledgeBase->save(); // Use save instead of update

        // Update the Algolia index
        $knowledgeBase->searchable();

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
