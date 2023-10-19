<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class TblUser extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $paginate = 5;
    public $search = '';

    protected $listeners = ['searchUsers' => 'searchUsers'];

    public function searchUsers($search)
    {
        $this->search = $search;
        if (empty($this->search)) {
            $this->resetPage();
        }
    }

    public function updatedSearch()
    {
        $this->searchUsers($this->search);
    }

    public function clearSearch()
    {
        $this->search = '';
        $this->resetPage();
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

        return view('livewire.tbl-user', [
            'users' => $users,
        ]);
    }
}