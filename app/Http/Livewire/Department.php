<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Department as ModelsDepartment;

class Department extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $checkedPost = [];
    public $selectAll = false;
    public $department_id, $name;
    
    public function createDepartment() {
        $this->validate([
             'name' => ['required'],
        ]);

        ModelsDepartment::create([
            'name' => $this->name
        ]);
        $this->resetModal();
        return redirect('/department')->with([
            'toast_type' => 'success', // Jenis pesan (success, error, warning, info)
            'toast_message' => 'Berhasil Menambahkan Department', // Isi pesan
        ]);
        
    }

    public function editDepartment($department_id) {
        $department = ModelsDepartment::find($department_id);
        if ($department) {
            $this->department_id = $department->id;
            $this->name = $department->name;
        }
    }

    public function updateDepartment() {
        $department = ModelsDepartment::find($this->department_id);

        $department->name = $this->name;
        $department->save();

        return redirect('/department')->with([
            'toast_type' => 'success',
            'toast_message' => 'Berhasil Memperbaharui Department',
        ]);
    }

    public function updatedSelectAll() {
        if ($this->selectAll) {
            // Menggunakan pluck secara langsung untuk mendapatkan array ID
            $this->checkedPost = ModelsDepartment::pluck('id')->map(function ($id) {
                return (string) $id;
            })->all();
        } else {
            $this->checkedPost = [];
        }
    }

    public function deleteCheckedPost() {
        try {
            ModelsDepartment::whereIn('id', $this->checkedPost)->delete();
    
            $this->checkedPost = [];
            
            return redirect('/department')->with([
                'toast_type' => 'success', // Jenis pesan (success, error, warning, info)
                'toast_message' => 'Pengguna Berhasil di Hapus!', // Isi pesan
            ]);
        } catch (\Throwable $th) {
            return redirect('/department')->with([
                'toast_type' => 'error', // Jenis pesan (success, error, warning, info)
                'toast_message' => 'Pengguna gagal di Hapus!', // Isi pesan
            ]);
        }
    }

    public function resetModal() {
        $this->reset();
    }

    public function render()
    {
        $department = ModelsDepartment::paginate(5);
        return view('livewire.department', [
            'department' => $department,
        ]);
    }
}
