<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class ModalUser extends Component
{
    // public $email, $password, $remember_me, $nama, $no_hp, $domisili, $alamat, $foto, $role_id, $user_id;

    // protected $listeners = ['editUser' => 'dataUser'];

    // public function rules() {
    //     return [
    //         'nama' => ['required'],
    //         'email' => ['required','email'],
    //         'password' => ['required'],
    //         'no_hp' => ['nullable','numeric'],
    //         'domisili' => ['nullable'],
    //         'alamat' => ['nullable'],
    //         'foto' => ['nullable'],
    //         'role_id' => ['required'],
    //     ];
    // }

    // public function createUser() {
    //     $this->validate();
    //     User::create([
    //         'nama' => $this->nama,
    //         'email' => $this->email,
    //         'password' => Hash::make($this->password),
    //         'no_hp' => $this->no_hp,
    //         'domisili' => $this->domisili,
    //         'alamat' => $this->alamat,
    //         'foto' => $this->foto,
    //         'role_id' => $this->role_id,
    //     ]);
    //     $this->resetModal();
    //     return redirect('/users')->with([
    //         'toast_type' => 'success', // Jenis pesan (success, error, warning, info)
    //         'toast_message' => 'Berhasil Menambahkan Pengguna', // Isi pesan
    //     ]);
    // }

    // public function dataUser($user_id) {
    //     $user = User::find($user_id);
    //     if ($user) {
    //         $this->email = $user->email;
    //         $this->password = $user->password;
    //         $this->nama = $user->nama;
    //         $this->no_hp = $user->no_hp;
    //         $this->domisili = $user->domisili;
    //         $this->alamat = $user->alamat;
    //         $this->foto = $user->foto;
    //         $this->role_id = $user->role_id;
    //     }
    // }

    // public function resetModal() {
    //     $this->nama = '';
    //     $this->email = '';
    //     $this->password = '';
    //     $this->no_hp = '';
    //     $this->domisili = '';
    //     $this->alamat = '';
    //     $this->foto = '';
    //     $this->role_id = '';
    // }

    // public function render()
    // {
    //     $role = Role::where('id', '!=', '1')->get();

    //     return view('livewire.modal-user', [
    //         'role' => $role,
    //     ]);
    // }

    public function render()
    {
        return view('livewire.modal-user');
    }
}
