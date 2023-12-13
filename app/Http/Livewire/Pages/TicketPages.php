<?php

namespace App\Http\Livewire\Pages;

use App\Models\Type;
use App\Models\User;
use App\Models\Tickets;
use Livewire\Component;
use App\Models\Category;
use App\Models\Department;

class TicketPages extends Component
{
    public $ticket_id, $name, $email, $subject, $details, $user_id, $type_id, $category_id, $department_id, $file;

    public function rules() {
        return [
            'email' => ['required', 'email', 'exists:users,email'],
            'user_id' => ['required'],
            'department_id' => ['required'],
            'type_id' => ['required'],
            'category_id' => ['required'],
            'subject' => ['required'],
            'details' => ['required'],
        ];
    }

    public function createTicket() { 
        $this->validate();
        dd(
            $this->email,
            $this->subject,
            $this->department_id,
            $this->type_id,
            $this->category_id,
            $this->details
        );

        $user = User::where('email', $this->email)->first();

        dd($user);
        
        Tickets::create([
            'user_id' => $user->id,
            'email' => $user->email,
            'subject' => $this->subject,
            'department_id' => $this->department_id,
            'type_id' => $this->type_id,
            'category_id' => $this->category_id,
            'details' => $this->details,
        ]);
        // $data = [
        //     'user_id' => $user->id,
        //     'email' => $user->email,
        //     'subject' => $this->subject,
        //     'department_id' => $this->department_id,
        //     'type_id' => $this->type_id,
        //     'category_id' => $this->category_id,
        //     'details' => $this->details,
        // ];
        // dd($data);
        $this->fresh();
        return redirect()->to('/e-ticket')->with([
            'toast_type' => 'success', // Jenis pesan (success, error, warning, info)
            'toast_message' => 'Tiket berhasil dibuat untuk pengguna dengan email' . $user->email, // Isi pesan
        ]);
    }

    public function fresh() {
        $this->reset();
        $this->details = NULL;
    }

    public function render()
    {
        $department = Department::where('id','!=', '1')->orderBy('name','asc')->get();
        $type = Type::orderBy('name','asc')->get();
        $category = Category::orderBy('name', 'asc')->get();


        return view('livewire.pages.ticket-pages', [
            'department' => $department,
            'type' => $type,
            'category' => $category,
        ]);
    }
}
