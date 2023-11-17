<?php

namespace App\Http\Livewire\KnowledgeBase;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\KnowledgeBase;

class TblKnowledge extends Component
{
    // use WithPagination;
    // protected $paginationTheme = 'bootstrap';
    // public $title, $type_id, $details, $kb_id;
    // public $checkedPost = [];
    // public $selectAll = false;
    // public $stackSearch;

    // public function updatedSelectAll() {
    //     if ($this->selectAll) {
    //         // Menggunakan pluck secara langsung untuk mendapatkan array ID
    //         $this->checkedPost = KnowledgeBase::pluck('id')->map(function ($id) {
    //             return (string) $id;
    //         })->all();
    //     } else {
    //         $this->checkedPost = [];
    //     }
    // }

    // public function deleteCheckedPost() {
    //     KnowledgeBase::whereIn('id', $this->checkedPost)->delete();
    //     $this->checkedPost = [];
    //     return redirect('/knowledge-base')->with([
    //         'toast_type' => 'success', // Jenis pesan (success, error, warning, info)
    //         'toast_message' => 'Knowledge Berhasil di Hapus !', // Isi pesan
    //     ]);
    // }

    // public function editKnowledge($id)
    // {
    //     session(['editing_kb_id' => $id]);
    //     return redirect()->to(route('edit_knowledge'));
    // }
    
    public function render()
    {
        // $knowledge_base = KnowledgeBase::all()->paginate($this->paginate);
        // $knowledge_base = KnowledgeBase::paginate(3);
        // $knowledge_base = KnowledgeBase::where('title', 'like', '%' . $this->stackSearch . '%')->paginate(10);

        return view('livewire.knowledge-base.tbl-knowledge');
    }
}
