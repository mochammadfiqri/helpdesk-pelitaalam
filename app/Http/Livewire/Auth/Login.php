<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Login extends Component
{
    use LivewireAlert;
    public $email, $password, $remember_me;

    public function rules() {
        return [
            'email' => ['required','email'],
            'password' => ['required'],
        ];
    }

    // Sementara
    // public function mount()
    // {
    //     $this->fill(['email' => 'admin@gmail.com', 'password' => 'admin']);
    // }

    public function login() {
        $this->validate();
        $throttleKey = strtolower($this->email) . '|' . request()->ip();

        if (RateLimiter::tooManyAttempts($throttleKey, 5)){
            $this->addError('email',__('auth.throttle', [
                'seconds' => RateLimiter::availableIn($throttleKey)
            ]));
            return null;
        }
        if (!Auth::attempt($this->only(['email','password']), $this->remember_me)) {

            RateLimiter::hit($throttleKey);

            $this->addError('email',__('auth.failed'));
            return null;
        }

        // return redirect()->to('/dashboard')->with('toast_success', 'Login Berhasil');
        return redirect('/dashboard')->with([
            'toast_type' => 'success', // Jenis pesan (success, error, warning, info)
            'toast_message' => 'Berhasil Login ', // Isi pesan
        ]);
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
