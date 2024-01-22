<?php

namespace App\Http\Livewire\Pages;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use StopWordFactory;
use App\Models\Tickets;
use Livewire\Component;
use App\Models\Category;
use App\Models\Priorities;
use Livewire\WithFileUploads;
use App\Models\DatasetTickets;
use Phpml\Dataset\ArrayDataset;
use Illuminate\Support\Facades\DB;
use Phpml\Classification\NaiveBayes;
use Sastrawi\Stemmer\StemmerFactory;
use TextAnalysis\Filters\LowerCaseFilter;
use TextAnalysis\Filters\StopWordsFilter;
use Phpml\Tokenization\WhitespaceTokenizer;
use TextAnalysis\Filters\PunctuationFilter;
use Phpml\FeatureExtraction\TfIdfTransformer;
use Phpml\FeatureExtraction\TokenCountVectorizer;

class TicketPages extends Component
{
    use WithFileUploads;
    public $name, $email, $subject, $user_id, $category_id, $department_id;
    public $file = [];
    public $details = '';

    protected function loadStopwords() {
        return StopWordFactory::get('stop-words_indonesian_1_id.txt');
    }

    public function createTicket() { 
        $details = strip_tags($this->details);

        // Lower Case Filter
        $transformer = new LowerCaseFilter();
        $lowerText = $transformer->transform($details);

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

        $nb = naive_bayes();
        // $dataset = DatasetTickets::all();
        $dataset = DB::table('dataset_tickets')
            ->select('subject','details','department_id','category_id','priority_id')
            ->orderBy('id')
            ->get();
        
        //Priority Predict
        // Bagi data menjadi data latih (training) dan data uji (testing)
        $trainingData = $dataset->slice(0, floor(1 * count($dataset))); // 100% data training

        // Latih model dengan data latih
        foreach ($trainingData as $key => $value) {
            $nb->train($value->priority_id, tokenize($value->details));
        }

        //Probabilitas
        $predict_priority_id = $nb->predict(tokenize($stemmedText));
        // Urutkan id berdasarkan probabilitas tertinggi
        $predictedPriority = array_search(max($predict_priority_id), $predict_priority_id);

        //Category Predict
        // Bagi data menjadi data latih (training) dan data uji (testing)
        $trainingData = $dataset->slice(0, floor(1 * count($dataset)));
        // Latih model dengan data latih
        foreach ($trainingData as $key => $value) {
            $nb->train($value->category_id, tokenize($value->details));
        }
        //Probabilitas
        $predict_category_id = $nb->predict(tokenize($stemmedText));
        // Urutkan id berdasarkan probabilitas tertinggi
        $predictedCategory = array_search(max($predict_category_id), $predict_category_id);    

        $priority = Priorities::find($predictedPriority);
        $user = User::where('email', $this->email)->first();
        
        $this->validate([
            'email' => 'required|email|exists:users,email',
            'subject' => 'required',
            'details' => 'required',
            'department_id' => 'required',
            'file' => 'nullable|max:1024', // sesuaikan dengan kebutuhan
        ], [
            'email.required' => 'Email tidak boleh kosong.',
            'email.email' => 'Email tidak valid.',
            'email.exists' => 'Email tidak belum terdaftar.',
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
                'user_id' => $user->id,
                'email' => $this->email,
                'subject' => $this->subject,
                'details' => $details,
                'resolve_within' => Carbon::now()->addDays($priority->resolve_time),
                'respond_within' => Carbon::now()->addHours($priority->response_time),
                'department_id' => $this->department_id,
                'priority_id' => "$predictedPriority",
                'category_id' => "$predictedCategory",
            ]);
    
            $ticket->photos()->createMany($pathFoto);
    
            $this->fresh();
            return redirect()->to('/')->with([
                'toast_type' => 'success', // Jenis pesan (success, error, warning, info)
                'toast_message' => 'Berhasil Membuat Ticket', // Isi pesan
            ]);
        } catch (\Throwable $th) {
            $this->fresh();
            return redirect()->to('/')->with([
                'toast_type' => 'error', // Jenis pesan (success, error, warning, info)
                'toast_message' => 'Gagal Membuat Ticket', // Isi pesan
            ]);
        }
        
    }

    // public function createTicket() {
    //     // Query data
    //     // $data = DB::table('dataset_tickets')
    //     //     ->select('subject','details','department_id','category_id','priority_id')
    //     //     ->orderBy('id')
    //     //     ->get();

    //     // // Pisahkan atribut dan label
    //     // $arr_atribute = [];
    //     // $arr_label = [];
    //     // foreach ($data as $row) {
    //     //     $arr_atribute[] = array_slice(get_object_vars($row), 0, -1); // Gunakan get_object_vars() untuk mengubah menjadi array
    //     //     $arr_label[] = $row->priority_id;
    //     // }

    //     // // Buat dataset
    //     // $dataset = new ArrayDataset($arr_atribute, $arr_label);
    //     // $samples = $dataset->getSamples();
    //     // $targets = $dataset->getTargets();

    //     // // Ambil data testing dari request (ganti dengan sesuai kebutuhan)
    //     // // $testing = request()->all(); // Asumsikan data testing dikirim melalui form POST
    //     // $testing = [
    //     //     'subject' => $this->subject,
    //     //     'details' => $this->details,
    //     //     'department_id' => $this->department_id,
    //     // ];
    //     // // $testing = array_slice($testing, 1, count($testing) - 2); // Filter data testing
    //     // // $testing = array_values($testing); // Reset indeks array
        
    //     // $classifier = new NaiveBayes();
    //     // $classifier->train($samples, $targets);
    //     // $hasil = $classifier->predict($testing);
        
    //     // dd($hasil);
        
    //     // $dataset = DatasetTickets::all();
    //     // $priority = $dataset->pluck('priority_id')->toArray();

    //     // dd($priority);

    //     // $samples = [[5, 1, 1], [1, 5, 1], [1, 1, 5], [5, 1, 5]];
    //     // $labels = ['a', 'b', 'c', 'a'];

    //     // $classifier = new NaiveBayes();
    //     // $classifier->train($samples, $labels);
    //     // $hasil = $classifier->predict([3, 1, 1]);

    //     // dd($hasil);
        
    //     // Preprocessing Non kategorikal
    //     // $dataset = DatasetTickets::all();
    //     // $details = $dataset->pluck('details')->toArray();
        
    //     // $vectorizer = new TokenCountVectorizer(new WhitespaceTokenizer());
    //     // $vectorizer->fit($details);
    //     // $vectorizer->transform($details);
        
    //     // $transformer = new TfIdfTransformer($details);
    //     // $transformer->transform($details);

    //     // dd($details);

    //     // $subject   = $dataset->pluck('subject')->toArray();
        
    //     // $vectorizer = new TokenCountVectorizer(new WhitespaceTokenizer());
    //     // $vectorizer->fit($subject);
    //     // $vectorizer->transform($subject);

    //     // $transformer = new TfIdfTransformer($subject);
    //     // $transformer->transform($subject);

    // }

    public function fresh() {
        $this->reset();
        $this->details = NULL;
    }

    public function render()
    {
        $department = Role::where('id', '!=', 14)->get();
        $category = Category::orderBy('name', 'asc')->get();

        return view('livewire.pages.ticket-pages', [
            'department' => $department,
            'category' => $category,
        ]);
    }
}
