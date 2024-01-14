<?php

namespace App\Http\Livewire\Users;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Component
{
    use WithFileUploads;
    public $email, $password, $remember_me, $nama, $no_hp, $foto, $role_id, $user_id, $file;
    public $role;
    public $selectedRole = [];

    public function rules() {
        return [
            'nama' => ['required'],
            'email' => ['required','email'],
            'password' => ['required'],
            'no_hp' => ['nullable','numeric'],
            'foto' => ['nullable','max:1024'],
            'selectedRole' => ['required'],
        ];
    }

    public function createUser() {
        // dd($this->nama);

        $this->validate();
        $pathFoto = null;
        if ($this->foto !== null) {
            $newName  = now()->timestamp . '_' . $this->foto->getClientOriginalName();
            $pathFoto = $this->foto->storeAs('foto-pengguna', $newName);
        }

        // $data = [
        //     'nama' => $this->nama,
        //     'email' => $this->email,
        //     'password' => Hash::make($this->password),
        //     'no_hp' => $this->no_hp,        
        //     'foto' => $pathFoto,
        //     $this->selectedRole
        // ];
        // dd($data);

        $user = User::create([
            'nama' => $this->nama,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'no_hp' => $this->no_hp,
            'foto' => $pathFoto,
        ]);

        $user->roles()->attach($this->selectedRole);

        $this->reset();
        return redirect('/users')->with([
            'toast_type' => 'success', // Jenis pesan (success, error, warning, info)
            'toast_message' => 'Berhasil Menambahkan Pengguna', // Isi pesan
        ]);
    }
    
    public function render()
    {
        $this->role = Role::all();

        return view('livewire.users.create-user');
    }
}
