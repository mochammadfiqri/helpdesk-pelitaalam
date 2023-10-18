<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\RateLimiter;
// use RealRashid\SweetAlert\Facades\Alert;

class Login extends Component
{
    
    public $email, $password, $remember_me;

    public function rules() {
        return [
            'email' => ['required','email'],
            'password' => ['required'],
        ];
    }

    // Sementara
    public function mount()
    {
        $this->fill(['email' => 'admin@gmail.com', 'password' => 'admin']);
    }

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

        return redirect()->to('/dashboard');
    }
    
    // protected $rules = [
    //     'email' => 'required|email:rfc,dns',
    //     'password' => 'required',
    // ];

    // public function mount()
    // {
    //     $this->fill(['email' => 'admin@gmail.com', 'password' => 'admin']);
    // }

    // public function login()
    // {
    //     if (auth()->attempt(['email' => $this->email, 'password' => $this->password], $this->remember_me)) {
    //         $user = User::where(["email" => $this->email])->first();
    //         auth()->login($user, $this->remember_me);
    //         return redirect('/dashboard')->with('toast_success', 'Login Berhasil');
    //     } else {
    //         return redirect('/login')->with('toast_error', 'Login Gagal');
    //     }
    // }
    
    public function render()
    {
        return view('livewire.auth.login');
    }
}
