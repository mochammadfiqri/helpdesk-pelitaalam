<?php

namespace App\Http\Livewire\ETicket;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\Type;
use App\Models\User;
use StopWordFactory;
use App\Models\Tickets;
use Livewire\Component;
use App\Models\Category;
use App\Models\Priorities;
use Livewire\WithFileUploads;
use App\Models\DatasetTickets;
use Sastrawi\Stemmer\StemmerFactory;
use TextAnalysis\Filters\LowerCaseFilter;
use TextAnalysis\Filters\StopWordsFilter;
use TextAnalysis\Filters\PunctuationFilter;

class CreateTicket extends Component
{
    use WithFileUploads;
    public $ticket_key, $name, $email, $subject, $user_id, $assigned_user_id, $type_id, $priority_id;
    public $respond_within, $resolve_within, $status_id, $category_id, $department_id, $sender_id, $receiver_id;
    public $file = [];
    public $details = '';

    public function mount() {
        $this->fill(['user_id' => auth()->user()->email]);
    }

    protected function loadStopwords() {
        return StopWordFactory::get('stop-words_indonesian_1_id.txt');
    }

    public function createTicket() { 
        // Lower Case Filter
        $transformer = new LowerCaseFilter();
        $lowerText = $transformer->transform($this->details);

        //Stopword
        $stopWord = new StopWordsFilter($this->loadStopwords());
        $stopWordText = $stopWord->transform($lowerText);
        
        //filter
        $filter = new PunctuationFilter();
        $textFilter = $filter->transform($stopWordText);
        
        //stemming
        $stemmerFactory = new StemmerFactory();
        $stemmer = $stemmerFactory->createStemmer();
        $tokenizedText = explode(" ", $textFilter); // Tokenisasi teks menjadi array kata
        $stemmedWords = array_map([$stemmer, 'stem'], $tokenizedText);
        $stemmedText = implode(" ", $stemmedWords);

        //Priority Predict
        $nb = naive_bayes();
        $dataset = DatasetTickets::select('subject', 'details', 'priority_id')->get();
        // Bagi data menjadi data latih (training) dan data uji (testing)
        $trainingData = $dataset->slice(0, floor(0.8 * count($dataset))); // 80% data training, 20% data testing
        // Latih model dengan data latih
        foreach ($trainingData as $key => $value) {
            $nb->train($value->priority_id, tokenize($value->details));
        }
        //Probabilitas
        $predict_priority_id = $nb->predict(tokenize($stemmedText));
        // Ubah output prediksi menjadi nama priority
        $predictedPriority = array_search(max($predict_priority_id), $predict_priority_id);

        //Category Predict
        $nb = naive_bayes();
        $dataset = DatasetTickets::select('subject', 'details', 'category_id')->get();
        // Bagi data menjadi data latih (training) dan data uji (testing)
        $trainingData = $dataset->slice(0, floor(0.8 * count($dataset)));
        // Latih model dengan data latih
        foreach ($trainingData as $key => $value) {
            $nb->train($value->category_id, tokenize($value->details));
        }
        //Probabilitas
        $predict_category_id = $nb->predict(tokenize($stemmedText));
        // Ubah output prediksi menjadi nama priority
        $predictedCategory = array_search(max($predict_category_id), $predict_category_id);    

        $priority = Priorities::find($predictedPriority);

        $this->validate([
            'user_id' => 'required',
            'subject' => 'required',
            'details' => 'required',
            'department_id' => 'required',
            'file' => 'nullable|max:1024'

        ], [
            'subject.required' => 'Subject tidak boleh kosong.',
            'details.required' => 'Details tidak boleh kosong.',
            'department_id.required' => 'Department tidak boleh kosong.',
            'file.max' => 'Ukuran foto Maksimal 1 MB.',
        ]);

        try {
            $pathFoto = [];
            foreach ($this->file as $foto) {
                $newName = now()->timestamp . '_' . $foto->getClientOriginalName();
                $path = $foto->storeAs('foto-tiket', $newName);
                $pathFoto[] = ['file_path' => $path];
            }
    
            $ticket = Tickets::create([
                'email' => auth()->user()->email,
                'subject' => $this->subject,
                'details' => $this->details,
                'resolve_within' => Carbon::now()->addDays($priority->resolve_time),
                'respond_within' => Carbon::now()->addHours($priority->response_time),
                'user_id' => auth()->user()->id,
                'department_id' => $this->department_id,
                'priority_id' => "$predictedPriority",
                'category_id' => "$predictedCategory",
            ]);
    
            $ticket->photos()->createMany($pathFoto);
    
            $this->fresh();
            return redirect()->to('/tickets')->with([
                'toast_type' => 'success', // Jenis pesan (success, error, warning, info)
                'toast_message' => 'Berhasil Menambahkan Tickets', // Isi pesan
            ]);
        } catch (\Throwable $th) {
            $this->fresh();
            return redirect()->to('/tickets')->with([
                'toast_type' => 'error', // Jenis pesan (success, error, warning, info)
                'toast_message' => 'Gagal Menambahkan Tickets', // Isi pesan
            ]);
        }
    }

    public function fresh() {
        $this->reset();
        $this->details = NULL;
    }

    public function render()
    {
        $user = User::whereDoesntHave('roles', function ($query) {
            $query->where('roles.id', 1);
        })->get();
        
        $department = Role::where('id', '!=', 14)->get();
        $ToUser = User::whereDoesntHave('roles', function ($query) {
            $query->where('roles.id', 14);
        })->get();
        $priority = Priorities::all();
        $category = Category::all();

        return view('livewire.e-ticket.create-ticket', [
            'user' => $user,
            'ToUser' => $ToUser,
            'priority' => $priority,
            'department' => $department,
            'category' => $category,
        ]);
    }
}
