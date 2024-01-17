<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Laravel\Socialite\Facades\Socialite;
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

        $user = User::where('email', $this->email)->first();

            if ($user && $user->email_verified_at) {
                if (!Auth::attempt($this->only(['email', 'password']), $this->remember_me)) {
                    RateLimiter::hit($throttleKey);

                    $this->addError('email', __('auth.failed'));
                    return null;
                }

                return redirect('/dashboard')->with([
                    'toast_type' => 'success',
                    'toast_message' => 'Selamat datang '. $user->nama,
                ]);
            } else {
                // Kirim email verifikasi jika belum verifikasi

                event(new Registered($user));

                Auth::login($user);
                
                // return redirect('/email/verify');

                // $user->sendEmailVerificationNotification();

                return redirect('/login')->with([
                    'toast_type' => 'info',
                    'toast_message' => 'Akun belum diverifikasi. Silakan periksa email Anda untuk verifikasi.',
                ]);
            }

        // if (!Auth::attempt($this->only(['email','password']), $this->remember_me)) {

        //     RateLimiter::hit($throttleKey);

        //     $this->addError('email',__('auth.failed'));
        //     return null;
        // }

        // return redirect('/dashboard')->with([
        //     'toast_type' => 'success', // Jenis pesan (success, error, warning, info)
        //     'toast_message' => 'Berhasil Login ', // Isi pesan
        // ]);
    }

    public function redirectToGoole() {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback() {
        try {
            $user = Socialite::driver('google')->user();
            $findUser = User::where('google_id', $user->id)->first();

            if ($findUser) {
                Auth::login($findUser);
                return redirect()->intended('dashboard');
            } else {
                $newUser = User::updateOrCreate(['email' => $user->email],[
                    'name' => $user->name,
                    'google_id' => $user->id,
                    // 'password' => Hash::make($this->password),
                    'password' => $user->password,
                ]);
                Auth::login($newUser);
                return redirect()->intended('dashboard');
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
