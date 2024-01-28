<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class Categories extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $checkedCategory = [];
    public $selectAll = false;
    public $category_id, $name;

    public function createCategories() {
        $this->validate([
             'name' => ['required'],
        ]);

        Category::create([
            'name' => $this->name
        ]);
        $this->resetModal();
        return redirect('/categories')->with([
            'toast_type' => 'success', // Jenis pesan (success, error, warning, info)
            'toast_message' => 'Berhasil Menambahkan Categories', // Isi pesan
        ]);
        
    }

    public function editCategory($category_id) {
        $category = Category::find($category_id);
        if ($category) {
            $this->category_id = $category->id;
            $this->name = $category->name;
        }
    }

    public function updateCategory() {
        $category = Category::find($this->category_id);

        $category->name = $this->name;
        $category->save();

        return redirect('/categories')->with([
            'toast_type' => 'success',
            'toast_message' => 'Berhasil Memperbaharui Category',
        ]);
    }

    public function updatedSelectAll() {
        if ($this->selectAll) {
            // Menggunakan pluck secara langsung untuk mendapatkan array ID
            $this->checkedCategory = Category::pluck('id')->map(function ($id) {
                return (string) $id;
            })->all();
        } else {
            $this->checkedCategory = [];
        }
    }

    public function deleteChecked() {
        try {
            //code...
            Category::whereIn('id', $this->checkedCategory)->delete();
            $this->checkedCategory = [];
            return redirect('/categories')->with([
                'toast_type' => 'success', // Jenis pesan (success, error, warning, info)
                'toast_message' => 'Kategori Berhasil di Hapus !', // Isi pesan
            ]);
        } catch (\Throwable $th) {
            return redirect('/categories')->with([
                'toast_type' => 'error', // Jenis pesan (success, error, warning, info)
                'toast_message' => 'Kategori gagal di Hapus !', // Isi pesan
            ]);
        }
    }

    public function resetModal() {
        $this->reset();
    }

    public function render()
    {
        $category = Category::paginate(5);
        return view('livewire.categories', [
            'category' => $category,
        ]);
    }
}
