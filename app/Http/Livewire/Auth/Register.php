<?php

namespace App\Http\Livewire\Auth;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Mail\MailSend;
use Livewire\Component;
use App\Models\UserVerify;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;


class Register extends Component
{
    public $search;
    public $email, $password, $remember_me, $nama, $no_hp, $foto, $role_id;

    // public function rules() {
    //     return [
    //         'nama' => 'required',
    //         'email' => 'required|email|unique:users',
    //         'password' => 'required',
    //         'no_hp' => 'nullable','numeric',
    //         'domisili' => 'nullable',
    //         'alamat' => 'nullable',
    //         'foto' => 'nullable',
    //         'role_id' => 'required',
    //     ];
    // }

    public function register() {
        $newUser = User::create([
            'nama' => $this->nama,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'no_hp' => $this->no_hp,
            'foto' => $this->foto,
            'role_id' => $this->role_id,
        ]);

        event(new Registered($newUser));

        Auth::login($newUser);
        
        return redirect('/email/verify');

        // $data = User::all();
        // Mail::to('akademikpelitaalam@gmail.com')->send(new MailSend($data));    
    }
    
    // public function register() {
    //     // $this->validate([
    //     //     'nama' => 'required',
    //     //     'email' => 'required|email|unique:users',
    //     //     'password' => 'required',
    //     //     'no_hp' => 'nullable','numeric',
    //     //     'role_id' => 'required',
    //     // ]);
        
    //     // $newUser = User::create([
    //     //     'nama' => $this->nama,
    //     //     'email' => $this->email,
    //     //     'password' => Hash::make($this->password),
    //     //     'no_hp' => $this->no_hp,
    //     //     'domisili' => $this->domisili,
    //     //     'alamat' => $this->alamat,
    //     //     'foto' => $this->foto,
    //     //     'role_id' => $this->role_id,
    //     // ]);

    //     // User::create([
    //     //     'nama' => $this->nama,
    //     //     'email' => $this->email,
    //     //     'password' => Hash::make($this->password),
    //     //     'no_hp' => $this->no_hp,
    //     //     'domisili' => $this->domisili,
    //     //     'alamat' => $this->alamat,
    //     //     'foto' => $this->foto,
    //     //     'role_id' => $this->role_id,
    //     // ]);

    //     // return redirect()->to('/login');

    //     // $token = Str::random(64);

    //     // UserVerify::create([
    //     //     'user_id' => $newUser->id, 
    //     //     'token' => $token
    //     // ]);

    //     // $details = [
    //     //     'Subject' => 'Verifikasi Email',
    //     //     'sender_name' => 'akademikpelitaalam@gmail.com',
    //     //     'nama' => $this->nama,
    //     //     'role_id' => $this->role_id,
    //     //     'website' => 'https://helpdesk-pelitaalam.smkkesehatan.com/',
    //     //     'datetime' => now()->isoFormat('D MMMM Y HH:mm:ss'),
    //     //     'url' => request()->getHttpHost().'/register/verify/'.$str
    //     // ];

    //     // // dd($user_create, $details);
    //     // Mail::to($this->email)->send(new MailSend($details));
    //     $data = User::all();
    //     Mail::to('akademikpelitaalam@gmail.com')->send(new MailSend($data));

    //     // $this->reset();
    //     // return redirect('/dashboard')->with([
    //     //     'toast_type' => 'success', // Jenis pesan (success, error, warning, info)
    //     //     'toast_message' => 'Link verifikasi telah dikrim ke Email Anda. Silahkan Cek Email Anda untuk Mengaktifkan Akun', // Isi pesan
    //     // ]);
    // }

    public function render() {
        // $users = User::with('role')->get();
        $role = Role::whereIn('id', [13, 14])->get();
                
        return view('livewire.auth.register', [
            // 'users' => $users,
            'role' => $role,
        ]);
    }
}
