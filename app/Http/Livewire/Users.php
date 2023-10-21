<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;

class Users extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $paginate = 5;
    public $search = '';
    public $email, $password, $remember_me, $nama, $no_hp, $domisili, $alamat, $foto, $role_id, $user_id;

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

    public function createUser() {
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
        $this->resetModal();
        return redirect('/users')->with([
            'toast_type' => 'success', // Jenis pesan (success, error, warning, info)
            'toast_message' => 'Berhasil Menambahkan Pengguna', // Isi pesan
        ]);
    }

    public function editUser($user_id) {
        $user = User::find($user_id);
        if ($user) {
            $this->user_id = $user->id;
            $this->nama = $user->nama;
            $this->email = $user->email;
            // $this->password = $user->password;
            $this->no_hp = $user->no_hp;
            $this->domisili = $user->domisili;
            $this->alamat = $user->alamat;
            $this->foto = $user->foto;
            $this->role_id = $user->role_id;
        } else {
            return redirect()->to('/users');
        }
    }

    public function updateUser() {
        User::where('id', $this->user_id)->update([
            'nama' => $this->nama,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'no_hp' => $this->no_hp,
            'domisili' => $this->domisili,
            'alamat' => $this->alamat,
            'foto' => $this->foto,
            'role_id' => $this->role_id,
        ]);
        return redirect('/users')->with([
            'toast_type' => 'success', // Jenis pesan (success, error, warning, info)
            'toast_message' => 'Berhasil Memperbaharui Pengguna', // Isi pesan
        ]);
    }

    public function deleteUser($user_id) {
        $this->user_id = $user_id;
    }

    public function destroyUser() {
        User::find($this->user_id)->delete();
        return redirect('/users')->with([
            'toast_type' => 'success', // Jenis pesan (success, error, warning, info)
            'toast_message' => 'Pengguna Berhasil di Hapus!', // Isi pesan
        ]);
    }

    public function resetModal() {
        $this->nama = '';
        $this->email = '';
        $this->password = '';
        $this->no_hp = '';
        $this->domisili = '';
        $this->alamat = '';
        $this->foto = '';
        $this->role_id = '';
    }

    public function clearSearch()
    {
        $this->search = '';
    }

    public function render()
    {
        $users = User::where('role_id', '!=', 1)
            ->when($this->search, function ($query) {
                $query->where(function ($query) {
                    $query->where('nama', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%')
                        ->orWhere('no_hp', 'like', '%' . $this->search . '%')
                        ->orWhere('domisili', 'like', '%' . $this->search . '%')
                        ->orWhere('alamat', 'like', '%' . $this->search . '%');
                });
            })
            ->latest()
            ->paginate($this->paginate);

        $role = Role::where('id', '!=', '1')->get();

        return view('livewire.users', [
            'users' => $users,
            'role' => $role,
        ]);
    }
}