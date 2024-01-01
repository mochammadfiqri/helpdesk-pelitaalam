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
    public $email, $password, $remember_me, $nama, $no_hp, $domisili, $alamat, $foto, $role_id, $user_id, $file;
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
            'domisili' => ['nullable'],
            'alamat' => ['nullable'],
            'foto' => ['nullable','max:1024'],
            'role_id' => ['required'],
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
        $this->checkedUser = User::where('role_id', '!=', 1)
            ->pluck('id')
            ->map(function ($id) {
                return (string) $id;
            })
            ->all();
    } else {
            $this->checkedUser = [];
        }
    }

    public function createUser() {
        $this->validate();
        $pathFoto = null;
        if ($this->foto !== null) {
            $newName  = now()->timestamp . '_' . $this->foto->getClientOriginalName();
            $pathFoto = $this->foto->storeAs('foto-pengguna', $newName);
        }

        User::create([
            'nama' => $this->nama,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'no_hp' => $this->no_hp,
            'domisili' => $this->domisili,
            'alamat' => $this->alamat,
            'foto' => $pathFoto,
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
            // $this->oldFoto = $user->foto;
            $this->role_id = $user->role_id;
            // dd($user);
        } else {
            return redirect()->to('/users');
        }
    }

    public function updateUser() {
        // $this->validate();
        $user = User::find($this->user_id);

        $user->nama = $this->nama;
        $user->email = $this->email;
        if (!empty($this->password)) {
            $user->password = Hash::make($this->password);
        }
        $user->no_hp = $this->no_hp;
        $user->domisili = $this->domisili;
        $user->alamat = $this->alamat;

        if ($this->foto !== null && is_object($this->foto)) {
            // Hapus foto lama jika ada
            if ($user->foto) {
                Storage::delete($user->foto);
            }

            $newName  = now()->timestamp . '_' . $this->foto->getClientOriginalName();
            $pathFoto = $this->foto->storeAs('foto-pengguna', $newName);
            $user->foto = $pathFoto;
        }

        $user->role_id = $this->role_id;
        $user->save();

        return redirect('/users')->with([
            'toast_type' => 'success',
            'toast_message' => 'Berhasil Memperbaharui Pengguna',
        ]);
    }

    // public function deleteUser($user_id) {
    //     $this->user_id = $user_id;
    // }

    // public function destroyUser() {
    //     $user = User::find($this->user_id);
    //     if ($user) {
    //         $this->nama = $user->nama;
    //     }

    //     if ($user->foto) {
    //         Storage::delete($user->foto);
    //     }

    //     $user->delete();

    //     return redirect('/users')->with([
    //         'toast_type' => 'success', // Jenis pesan (success, error, warning, info)
    //         'toast_message' => 'Pengguna Berhasil di Hapus!', // Isi pesan
    //     ]);
    // }

    // public function deleteCheckedUser() {
    //     $users = User::whereIn('id', $this->checkedUser)->get();
    //     $tickets = Tickets::where('user_id', $this->checkedUser)->first();

    //     foreach ($tickets as $ticket) {
            
    //         if ($ticket) {
    //             Message::where('discussion_id', $ticket->id)->delete();
    //             $ticket->delete();
    //         }
    //     }

    //     foreach ($users as $user) {
    //         if ($user) {
    //             Tickets::where('user_id', $this->checkedUser)->delete();
    //         }

    //         if ($user->foto) {
    //             Storage::delete($user->foto);
    //         }
    //     }

    //     User::whereIn('id', $this->checkedUser)->delete();
    //     $this->checkedUser = [];

    //     return redirect('/users')->with([
    //         'toast_type' => 'success', // Jenis pesan (success, error, warning, info)
    //         'toast_message' => 'Pengguna Berhasil di Hapus!', // Isi pesan
    //     ]);
    // }

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
        // $users = User::where('role_id', '!=', 1)
        //     ->when($this->search, function ($query) {
        //         $query->where(function ($query) {
        //             $query->where('nama', 'like', '%' . $this->search . '%')
        //                 ->orWhere('email', 'like', '%' . $this->search . '%')
        //                 ->orWhere('no_hp', 'like', '%' . $this->search . '%')
        //                 ->orWhere('domisili', 'like', '%' . $this->search . '%')
        //                 ->orWhere('alamat', 'like', '%' . $this->search . '%');
        //         });
        //     })
        //     ->orderBy('nama', 'asc')
        //     ->paginate($this->paginate);
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
        ->when(count($this->filter), function ($query) {
            $query->whereIn('role_id', array_keys($this->filter));
        })
        ->orderBy('nama', 'asc')
        ->paginate($this->paginate);

        $role = Role::where('id', '!=', '1')->get();

        return view('livewire.users', [
            'users' => $users,
            'role' => $role,
        ]);
    }
}