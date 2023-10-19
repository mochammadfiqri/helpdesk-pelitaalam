<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    public $search = '';

    public function clearSearch()
    {
        $this->search = '';
    }

    protected $listeners = ['searchUsers' => 'searchUsers'];

    public function updatedSearch()
    {
        $this->emit('searchUsers', trim($this->search));
    }

    public function searchUsers($search)
    {
        $this->search = $search;
    }
    
    public function render()
    {
        if (empty(trim($this->search))) {
            $users = User::latest()->get();
        } else {
            $users = User::where(function ($query) {
                $query->where('nama', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%')
                ->orWhere('no_hp', 'like', '%' . $this->search . '%')
                ->orWhere('domisili', 'like', '%' . $this->search . '%')
                ->orWhere('alamat', 'like', '%' . $this->search . '%');
            })->get();
        }

        return view('livewire.users', [
            'users' => $users,
        ]);
    }
}