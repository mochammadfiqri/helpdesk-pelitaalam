<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\KnowledgeBase;

class KnowledgePost extends Component
{
    public $slug, $knowledge_base;

    public function viewPost($slug) {
        session(['knowledgePost' => $slug]);
        return redirect()->to(route('knowledge-post', ['slug' => $slug]));
    }

    public function mount()
    {
        $this->slug = session('knowledgePost');
        $this->loadKnowledgePost();
    }

    public function loadKnowledgePost() {
        $this->knowledge_base = KnowledgeBase::where('slug', $this->slug)->first();
        // dd($this->knowledge_base);
    }

    public function render()
    {
        $kb_post = KnowledgeBase::latest()->where('slug', '!=', $this->slug)->take(5)->get();

        return view('livewire.pages.knowledge-post', [
            'knowledge_base' => $this->knowledge_base,
            'kb_post' => $kb_post
        ]);
    }
}
