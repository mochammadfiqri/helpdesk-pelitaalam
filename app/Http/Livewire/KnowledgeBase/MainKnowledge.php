<?php

namespace App\Http\Livewire\KnowledgeBase;

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
    public $stackSearch;

    public $title, $type_id, $details, $kb_id, $search;

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

    public function editKnowledge($id)
    {
        session(['editing_kb_id' => $id]);
        return redirect()->to(route('edit_knowledge'));
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

        $type = Type::all();
        
        return view('livewire.knowledge-base.main-knowledge', [
            'knowledge_base' => $knowledge_base,
            'type' => $type,
        ]);
    }
}