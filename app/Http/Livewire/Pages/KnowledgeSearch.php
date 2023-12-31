<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\KnowledgeBase;

class KnowledgeSearch extends Component
{
    public $search = '';
    public $knowledge_base;

    public function viewPost($slug) {
        session(['knowledgePost' => $slug]);
        return redirect()->to(route('knowledge-post', ['slug' => $slug]));
    }

    public function render()
    {
        if (empty($this->search)) {
            $this->knowledge_base = KnowledgeBase::where('title', $this->search)->get();
        } else {
            $this->knowledge_base = KnowledgeBase::where('title', 'like', '%' . $this->search . '%')->limit(5)->get();
        }

        return view('livewire.pages.knowledge-search');
    }
}
