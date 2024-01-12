<?php

namespace App\Http\Livewire\Pages;

use App\Models\Type;
use App\Models\User;
use StopWordFactory;
use App\Models\Tickets;
use Livewire\Component;
use App\Models\Category;
use App\Models\Department;
use App\Models\DatasetTickets;
use Sastrawi\Stemmer\StemmerFactory;
use TextAnalysis\Filters\LowerCaseFilter;
use TextAnalysis\Filters\StopWordsFilter;
use TextAnalysis\Filters\PunctuationFilter;

class TicketPages extends Component
{
    public $ticket_id, $name, $email, $subject, $details, $user_id, $type_id, $category_id, $department_id, $file;

    public function rules() {
        return [
            'email' => ['required', 'email', 'exists:users,email'],
            'subject' => ['required', 'unique:dataset_tickets'],
            'details' => ['required', 'unique:dataset_tickets'],
        ];
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

        // //Priority Predict
        $nb = naive_bayes();
        $dataset = DatasetTickets::all();

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

        //Type Predict
        $nb = naive_bayes();
        $dataset = DatasetTickets::all();
        $trainingData = $dataset->slice(0, floor(0.8 * count($dataset)));
        foreach ($trainingData as $key => $value) {
            $nb->train($value->type_id, tokenize($value->details));
        }
        $predict_type_id = $nb->predict(tokenize($stemmedText));
        $predictedType = array_search(max($predict_type_id), $predict_type_id);

        //Category Predict
        $nb = naive_bayes();
        $dataset = DatasetTickets::all();
        $trainingData = $dataset->slice(0, floor(0.8 * count($dataset)));
        foreach ($trainingData as $key => $value) {
            $nb->train($value->category_id, tokenize($value->details));
        }
        $predict_category_id = $nb->predict(tokenize($stemmedText));
        $predictedCategory = array_search(max($predict_category_id), $predict_category_id);

        //Department Predict
        $nb = naive_bayes();
        $dataset = DatasetTickets::all();
        $trainingData = $dataset->slice(0, floor(0.8 * count($dataset)));
        foreach ($trainingData as $key => $value) {
            $nb->train($value->department_id, tokenize($value->details));
        }
        $predict_department_id = $nb->predict(tokenize($stemmedText));
        $predictedDepartment = array_search(max($predict_department_id), $predict_department_id);

        try {
            $user = User::where('email', $this->email)->first();
            $this->validate();
            Tickets::create([
                'user_id' => $user->id,
                'email' => $this->email,
                'subject' => $this->subject,
                'details' => $this->details,
                'priority_id' => "$predictedPriority",
                'department_id' => "$predictedDepartment",
                'type_id' => "$predictedType",
                'category_id' => "$predictedCategory",
            ]);
            $this->fresh();
            return redirect()->to('/')->with([
                'toast_type' => 'success', // Jenis pesan (success, error, warning, info)
                'toast_message' => 'Berhasil Membuat Tickets', // Isi pesan
            ]);
        } catch (\Throwable $th) {
            return redirect()->to('/')->with([
                'toast_type' => 'error', // Jenis pesan (success, error, warning, info)
                'toast_message' => 'Gagal Membuat Ticket', // Isi pesan
            ]);
        }
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
