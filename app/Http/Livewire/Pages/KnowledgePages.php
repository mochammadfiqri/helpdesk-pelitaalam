<?php

namespace App\Http\Livewire\Pages;

use App\Models\Type;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\KnowledgeBase;

class KnowledgePages extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;

    public function viewPost($slug) {
        session(['knowledgePost' => $slug]);
        return redirect()->to(route('knowledge-post', ['slug' => $slug]));
    }
    
    public function render()
    {
        $knowledge_base = KnowledgeBase::where('title', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc') // Sesuaikan dengan kolom dan urutan yang diinginkan
            ->paginate(6);

        return view('livewire.pages.knowledge-pages', [
            'knowledge_base' => $knowledge_base,
        ]);
    }
}
