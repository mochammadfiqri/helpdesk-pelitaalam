<?php

namespace App\Http\Livewire;

use App\Models\Type;
use Livewire\Component;

class Types extends Component
{
    public $name, $type_id;

    public function rules() {
        return [
            'name' => ['required'],
        ];
    }

    public function createType() {
        $this->validate();
        Type::create([
            'name' => $this->name,
        ]);
        $this->resetModal();
        return redirect('/types')->with([
            'toast_type' => 'success', // Jenis pesan (success, error, warning, info)
            'toast_message' => 'Berhasil Menambahkan Type', // Isi pesan
        ]);
    }

    public function editType($type_id) {
        $type = Type::find($type_id);
        if ($type) {
            $this->type_id = $type->id;
            $this->name = $type->name;
        } else {
            return redirect()->to('/types');
        }
    }

    public function updateType() {
        $type = Type::find($this->type_id);

        $type->name = $this->name;
        $type->save();

        return redirect('/types')->with([
            'toast_type' => 'success',
            'toast_message' => 'Berhasil Memperbaharui Type',
        ]);
    }

    public function removeType() {
        // jika ingin menghapus type, cek terlebih dahulu di table yg berelasi, apakah ada atau tidak.
        // jika ada maka tidak bisa di hapus
        try {
            $type = Type::find($this->type_id);
    
            if ($type) {
                $this->name = $type->name;
            }
            $type->delete();
            
            return redirect('/types')->with([
                'toast_type' => 'success', // Jenis pesan (success, error, warning, info)
                'toast_message' => 'Type Berhasil di Hapus!', // Isi pesan
            ]);
        } catch (\Throwable $th) {
            return redirect('/types')->with([
                'toast_type' => 'error', // Jenis pesan (success, error, warning, info)
                'toast_message' => 'Type Gagal di Hapus!', // Isi pesan
            ]);
        }

    }

    public function resetModal() {
        $this->reset();
    }

    public function render()
    {
        $type = Type::all();
        return view('livewire.types', [
           'type' => $type, 
        ]);
    }
}
