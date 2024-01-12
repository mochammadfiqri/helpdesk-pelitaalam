<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Logout extends Component
{
    public function logout() {
        auth()->logout();
        if (!request()->is('chat-ai')) {
            session()->forget('chat');
        }
        return redirect('/')->with([
            'toast_type' => 'success', // Jenis pesan (success, error, warning, info)
            'toast_message' => 'Berhasil Log out', // Isi pesan
        ]);
    }

    public function render()
    {
        return view('livewire.auth.logout');
    }
}
