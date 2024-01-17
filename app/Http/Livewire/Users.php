<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\User;
use App\Models\Message;
use App\Models\Tickets;
use Livewire\Component;
use App\Imports\UsersImport;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class Users extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $q, $email, $password, $remember_me, $nama, $no_hp, $foto, $role_id, $user_id, $file;
    public $paginate = 5;
    public $search = '';
    public $checkedUser = [];
    public $filter = [];
    public $selectAll = false;

    public function rules() {
        return [
            'nama' => ['required'],
            'email' => ['required','email'],
            'password' => ['required'],
            'no_hp' => ['nullable','numeric'],
            'foto' => ['nullable','max:1024'],
        ];
    }

    public function importUsers() {
        $this->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        // dd($this->file);
        Excel::import(new UsersImport, $this->file->getRealPath());

        return redirect('/users')->with([
            'toast_type' => 'success',
            'toast_message' => 'Import Berhasil',
        ]);
    }

    public function updatedSelectAll() {
        if ($this->selectAll) {
        $this->checkedUser = User::whereHas('roles', function ($query) {
                $query->where('roles.id', '!=', 1);
            })->pluck('id')
            ->map(function ($id) {
                return (string) $id;
            })
            ->all();
    } else {
            $this->checkedUser = [];
        }
    }

    public function editUser($user_id) {
        session(['editing_user' => $user_id]);
        return redirect()->to(route('edit.user', ['user_id' => $user_id]));
    }

    public function deleteCheckedUser() {
    $users = User::whereIn('id', $this->checkedUser)->get();

    foreach ($users as $user) {
        // Hapus tiket dan pesan terkait
        $tickets = Tickets::where('user_id', $user->id)->get();
        foreach ($tickets as $ticket) {
            Message::where('discussion_id', $ticket->id)->delete();
            $ticket->delete();
        }

        // Hapus foto jika ada
        if ($user->foto) {
            Storage::delete($user->foto);
        }
    }

        // Hapus pengguna
        User::whereIn('id', $this->checkedUser)->delete();
        $this->checkedUser = [];

        // Menghapus relasi
        $users->roles()->detach();

        return redirect('/users')->with([
            'toast_type' => 'success',
            'toast_message' => 'Pengguna Berhasil di Hapus!',
        ]);
    }


    public function resetModal() {
        $this->reset();
    }

    public function clearSearch()
    {
        $this->search = '';
    }

    public function render()
    {
        $users = User::whereHas('roles', function ($roleQuery) {
            $roleQuery->where('roles.id', '!=', 1); // memberikan keterangan bahwa 'id' berasal dari tabel 'roles'
        })
        ->when($this->search, function ($query) {
            $query->where(function ($query) {
                $query->where('nama', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('no_hp', 'like', '%' . $this->search . '%');
            });
        })
        ->when(count($this->filter), function ($query) {
            $query->whereHas('roles', function ($roleQuery) {
                $roleQuery->whereIn('roles.id', $this->filter);
            });
        })
        ->orderBy('nama', 'asc')
        ->paginate($this->paginate);

        // $role = Role::whereNotIn('id', [1])->get();
        $role = Role::search($this->q)->get();

        return view('livewire.users', [
            'users' => $users,
            'role' => $role,
        ]);
    }
}