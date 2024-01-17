<?php

namespace App\Http\Livewire\Users;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class EditUser extends Component
{
    public $user_id, $role;
    public $q, $email, $password, $remember_me, $nama, $no_hp, $foto, $file;
    public $selectedRole = [];

    public function mount()
    {
        $this->user_id = session('editing_user');
        $this->loadEditDetails();
    }

    public function loadEditDetails() {
        $user = User::where('id', $this->user_id)->first();
        if ($user) {
            $this->user_id = $user->id;
            $this->nama = $user->nama;
            $this->email = $user->email;
            // $this->password = $user->password;
            $this->no_hp = $user->no_hp;
            $this->foto = $user->foto;
            // $this->oldFoto = $user->foto;
            $this->selectedRole = $user->roles->pluck('id')->toArray();
            // dd($user);
        } else {
            return redirect()->to('/users');
        }
    }

    public function updateUser() {
        $user = User::find($this->user_id);
        $user->nama = $this->nama;
        $user->email = $this->email;
        // if (!empty($this->password)) {
        //     $user->password = Hash::make($this->password);
        // }
        $user->no_hp = $this->no_hp;

        if ($this->foto !== null && is_object($this->foto)) {
            // Hapus foto lama jika ada
            if ($user->foto) {
                Storage::delete($user->foto);
            }

            $newName  = now()->timestamp . '_' . $this->foto->getClientOriginalName();
            $pathFoto = $this->foto->storeAs('foto-pengguna', $newName);
            $user->foto = $pathFoto;
        }

        // $user->role_id = $this->role_id;
        $user->save();

        // Pembaruan roles (peran)
        if ($this->selectedRole) {
            $user->roles()->sync($this->selectedRole);
        }

        return redirect('/users')->with([
            'toast_type' => 'success',
            'toast_message' => 'Berhasil Memperbaharui Pengguna',
        ]);
    }

    public function updatePassword() {
        $user = User::find($this->user_id);
        if (!empty($this->password)) {
            $user->password = Hash::make($this->password);
        }
        return redirect()->to(route('edit.user', ['user_id' => $this->user_id]))->with([
            'toast_type' => 'success',
            'toast_message' => 'Berhasil Mengganti Password',
        ]);
    }

    public function render()
    {
        $this->role = Role::search($this->q)->get();

        return view('livewire.users.edit-user');
    }
}
