<?php

namespace App\Http\Livewire\KnowledgeBase;

use App\Models\Category;
use App\Models\Type;
use Livewire\Component;
use App\Models\KnowledgeBase;

class EditKnowledge extends Component
{
    public $title, $details, $slug, $kb_id, $search;
    public $selectedCategory = [];

    public function mount()
    {
        $this->slug = session('editing_kb_slug');
        $this->loadKnowledgeDetails();
        
    }

    public function loadKnowledgeDetails()
    {
        $knowledge_base = KnowledgeBase::where('slug', $this->slug)->first();

        // dd($knowledge_base);

        if ($knowledge_base) {
            $this->kb_id = $knowledge_base->id;
            $this->title = $knowledge_base->title;
            $this->slug = $knowledge_base->slug;
            $this->details = $knowledge_base->details;
            // $this->category_id = $knowledge_base->category_id;
            $this->selectedCategory = $knowledge_base->categories->pluck('id')->toArray();
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
        // $knowledgeBase->category_id = $this->category_id;
        $knowledgeBase->details = $this->details;

        $knowledgeBase->save(); // Use save instead of update

        // Pembaruan categories
        if ($this->selectedCategory) {
            $knowledgeBase->categories()->sync($this->selectedCategory);
        }

        // Update the Algolia index
        $knowledgeBase->searchable();

        return redirect()->to('/knowledge-base')->with([
            'toast_type' => 'success',
            'toast_message' => 'Berhasil Memperbaharui Knowledge',
        ]);
    }
    
    public function render()
    {
        $category = Category::all();

        return view('livewire.knowledge-base.edit-knowledge', [
            'category' => $category,
        ]);
    }
}
