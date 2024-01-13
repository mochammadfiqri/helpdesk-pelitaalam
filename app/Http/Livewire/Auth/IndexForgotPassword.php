<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Password;

class IndexForgotPassword extends Component
{
    public $email;

    public function resetPassword() {
        $this->validate([
            'email' => 'required|email'
        ]);

        $status = Password::sendResetLink(
            $this->only(['email' => $this->email])
        );

        // Gunakan SweetAlert di sini
        if ($status === Password::RESET_LINK_SENT) {
            $this->dispatchBrowserEvent('swal:success', [
                'title' => 'Berhasil',
                'text' => 'Tautan reset password telah dikirim ke email Anda.',
            ]);
        } else {
            $this->dispatchBrowserEvent('swal:error', [
                'title' => 'Gagal',
                'text' => 'Email tidak dapat ditemukan atau terdapat kesalahan lain.',
            ]);
        }
        
        // return $status === Password::RESET_LINK_SENT
        //     ? back()->with(['status' => __($status)])
        //     : back()->withErrors(['email' => __($status)]);
    }   

    public function render()
    {
        return view('livewire.auth.index-forgot-password');
    }
}
