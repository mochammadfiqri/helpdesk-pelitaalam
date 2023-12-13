<?php

namespace App\Http\Livewire\ETicket;

use App\Models\Type;
use App\Models\User;
use App\Models\Tickets;
use Livewire\Component;
use App\Models\Category;
use App\Models\Department;
use App\Models\Priorities;
use Phpml\Classification\NaiveBayes;
use Phpml\Tokenization\WordTokenizer;
use Phpml\Classification\KNearestNeighbors;

class CreateTicket extends Component
{
    public $ticket_key, $name, $email, $subject, $details, $user_id, $assigned_user_id, $type_id, $priority_id, $status_id, $category_id, $department_id, $file;

    public function rules() {
        return [
            'user_id' => ['required'],
            'priority_id' => ['required'],
            'department_id' => ['required'],
            'type_id' => ['required'],
            'category_id' => ['required'],
            'subject' => ['required'],
            'details' => ['required'],
        ];
    }

    // public function createTicket() {
    //     $user = User::find($this->user_id);

    //     $this->validate();
    //     Tickets::create([
    //         'email' => $user->email,
    //         'user_id' => $this->user_id,
    //         'assigned_user_id' => $this->assigned_user_id,
    //         'priority_id' => $this->priority_id,
    //         'department_id' => $this->department_id,
    //         'type_id' => $this->type_id,
    //         'category_id' => $this->category_id,
    //         'subject' => $this->subject,
    //         'details' => $this->details,
    //     ]);
    //     $this->fresh();
    //     return redirect()->to('/tickets')->with([
    //         'toast_type' => 'success', // Jenis pesan (success, error, warning, info)
    //         'toast_message' => 'Berhasil Menambahkan Tickets', // Isi pesan
    //     ]);
    // }

    public function createTicket() { 
        //Preprocessing: Tokenization, Filtering and Stemming
        // $stemmerFactory = new StemmerFactory();
        // $stemmer  = $stemmerFactory->createStemmer();
        // $stopWordRemoverFactory = new StopWordRemoverFactory();
        // $stopWordRemover = $stopWordRemoverFactory->createStopWordRemover();

        // $filteredWords = $stopWordRemover->remove($this->details);
        // $stemToken   = $stemmer->stem($filteredWords);

        // $tokenizer = new WhitespaceTokenizer();
        // $tokens = $tokenizer->tokenize($stemToken);

        // dd($tokens);

        // $tokenizer = new WordTokenizer();
        // $tokens = $tokenizer->tokenize($this->details);
        // dd($tokens);

        $data = [
            [
                'subject' => 'Website tidak bisa dibuka',
                'details' => 'Website tidak bisa dibuka di semua browser',
                'priority' => 'High',
                'type' => 'Website',
                'category' => 'Internet',
            ],
            [
                'subject' => 'Aplikasi tidak bisa dibuka',
                'details' => 'Aplikasi tidak bisa dibuka di semua perangkat',
                'priority' => 'Medium',
                'type' => 'Aplikasi',
                'category' => 'Software',
            ],
            [
                'subject' => 'Data hilang',
                'details' => 'Data hilang dari database',
                'priority' => 'Low',
                'type' => 'Data',
                'category' => 'Technical',
            ],
        ];

        $classifier = new NaiveBayes();
        $labels = array_column($data, 'priority');
        $classifier->train($data, $labels);

        $ticket = [
            'subject' => 'Laptop bluescreen',
            'details' => 'Selamat siang, tolong perbaiki laptop saya, laptop saya mengalami bluescreen. Terima kasih',
        ];

        $prediction = $classifier->predict($ticket);
        
        dd(["Priority: " . $prediction['priority'] . "\n"],["Type: " . $prediction['type'] . "\n"],["Category: " . $prediction['category'] . "\n"]);

        // $user = User::find($this->user_id);

        // $data = [
        //     'email' => $user->email,
        //     'user_id' => $this->user_id,
        //     'assigned_user_id' => $this->assigned_user_id,
        //     'priority_id' => $priority->id,
        //     'department_id' => $this->department_id,
        //     'type_id' => $type->id,
        //     'category_id' => $category->id,
        //     'subject' => $this->subject,
        //     'details' => $this->details,

        // ];
 
     
    }

    public function fresh() {
        $this->reset();
        $this->details = NULL;
    }

    public function render()
    {
        $user = User::where('role_id', '!=', '1')->get();
        $assignToUser = User::where('role_id', '!=', '2')->get();
        $priority = Priorities::all();
        $department = Department::all();
        $type = Type::all();
        $category = Category::all();

        return view('livewire.e-ticket.create-ticket', [
            'user' => $user,
            'assignToUser' => $assignToUser,
            'priority' => $priority,
            'department' => $department,
            'type' => $type,
            'category' => $category,
        ]);
    }
}
