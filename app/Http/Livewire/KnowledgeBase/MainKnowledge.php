<?php

namespace App\Http\Livewire\KnowledgeBase;

use App\Models\Category;
use App\Models\Type;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\KnowledgeBase;

class MainKnowledge extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $checkedPost = [];
    public $selectAll = false;

    public $title, $category_id, $details, $kb_id, $slug, $search;

    public function updatedSelectAll() {
        if ($this->selectAll) {
            // Menggunakan pluck secara langsung untuk mendapatkan array ID
            $this->checkedPost = KnowledgeBase::pluck('id')->map(function ($id) {
                return (string) $id;
            })->all();
        } else {
            $this->checkedPost = [];
        }
    }

    public function deleteCheckedPost() {
        KnowledgeBase::whereIn('id', $this->checkedPost)->delete();
        $this->checkedPost = [];
        return redirect('/knowledge-base')->with([
            'toast_type' => 'success', // Jenis pesan (success, error, warning, info)
            'toast_message' => 'Knowledge Berhasil di Hapus !', // Isi pesan
        ]);
    } 
    
    public function editKnowledge($slug)
    {
        session(['editing_kb_slug' => $slug]);
        return redirect()->to(route('edit_knowledge', ['slug' => $slug]));
    }

    public function clearSearch()
    {
        $this->search = '';
    }

    public function render()
    {
        $knowledge_base = KnowledgeBase::where('title', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc') // Sesuaikan dengan kolom dan urutan yang diinginkan
            ->paginate(5);

        $category = Category::all();
        
        return view('livewire.knowledge-base.main-knowledge', [
            'knowledge_base' => $knowledge_base,
            'category' => $category,
        ]);
    }
}
