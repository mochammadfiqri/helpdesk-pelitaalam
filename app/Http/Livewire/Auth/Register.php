<?php

namespace App\Http\Livewire\Auth;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{
    public $search;

    public $email, $password, $remember_me, $nama, $no_hp, $domisili, $alamat, $foto, $role_id;

    public function rules() {
        return [
            'nama' => ['required'],
            'email' => ['required','email'],
            'password' => ['required'],
            'no_hp' => ['nullable','numeric'],
            'domisili' => ['nullable'],
            'alamat' => ['nullable'],
            'foto' => ['nullable'],
            'role_id' => ['required'],
        ];
    }

    public function register() {
        $this->validate();
        User::create([
            'nama' => $this->nama,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'no_hp' => $this->no_hp,
            'domisili' => $this->domisili,
            'alamat' => $this->alamat,
            'foto' => $this->foto,
            'role_id' => $this->role_id,
        ]);
        return redirect()->to('/login');
    }

    public function render()
    {
        // $users = $this->search === null ?
        // User::with('role')->latest()->paginate($this->paginate) :
        // User::with('role')
        //     ->where('email', 'like', '%' . $this->search . '%')
        //     ->orWhere('nama', 'like', '%' . $this->search . '%')
        //     ->orWhere('no_hp', 'like', '%' . $this->search . '%')
        //     ->orWhere('domisili', 'like', '%' . $this->search . '%')
        //     ->orWhere('alamat', 'like', '%' . $this->search . '%')
        //     ->latest()
        //     ->paginate($this->paginate);
        $users = User::with('role')->get();
        $role = Role::where('id', '!=', '1')->get();
                
        return view('livewire.auth.register', [
            'users' => $users,
            'role' => $role,
        ]);
    }
}
