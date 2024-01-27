<?php

namespace App\Http\Livewire\Auth;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Mail\MailSend;
use Livewire\Component;
use App\Models\UserVerify;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;


class Register extends Component
{
    public $search;
    public $email, $password, $remember_me, $nama, $no_hp, $foto;
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

    public function register() {
        $this->validate();
        $pathFoto = null;
        if ($this->foto !== null) {
            $newName  = now()->timestamp . '_' . $this->foto->getClientOriginalName();
            $pathFoto = $this->foto->storeAs('foto-pengguna', $newName);
        }

        $newUser = User::create([
            'nama' => $this->nama,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'no_hp' => $this->no_hp,
            'foto' => $pathFoto,
        ]);

        $newUser->roles()->attach($this->selectedRole);

        event(new Registered($newUser));

        Auth::login($newUser);
        
        return redirect('/email/verify');

    }
    
    public function render() {
        // $users = User::with('role')->get();
        $role = Role::whereIn('id', [13, 14])->get();
                
        return view('livewire.auth.register', [
            // 'users' => $users,
            'role' => $role,
        ]);
    }
}
