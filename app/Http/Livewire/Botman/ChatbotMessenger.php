<?php

namespace App\Http\Livewire\Botman;
use GuzzleHttp\Client;
use Livewire\Component;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;

class ChatbotMessenger extends Component
{
    // public $greetings = ['hi','halo','hello','selamat malam','selamat pagi','selamat siang','assalamualaikum'];

    public function mount()
    {
        // Initialize BotMan widget
        $this->dispatchBrowserEvent('initBotManWidget');
    }
    
    // public function handle()
    // {
    //     $botman = app('botman');

    //     $botman->hears('{message}', function ($botman, $message) {

    //         if ($message == 'hi') {
    //             $this->askName($botman);
    //         } else {
    //             $botman->reply("write 'hi' for testing...");
    //         }
    //     });

    //     $botman->listen();
    // }

    // public function askName($botman)
    // {
    //     $botman->ask("Hello! What is your name?", function(Answer $answer){
    //         $name = $answer->getText();
    //         $this->say('Nice to meet you '. $name);
    //     });
    // }

    public function handle()
    {
        $botman = app('botman');

        $botman->hears('{message}', function ($botman, $message) {
            // Menggunakan kunci API OpenAI (ganti dengan kunci Anda)
            $openaiApiKey = env('OPENAI_API_KEY');

            // Logika untuk membuat permintaan ke OpenAI API
            $response = $this->askOpenAI($message, $openaiApiKey);

            // Menanggapi pengguna berdasarkan respon dari OpenAI
            $botman->reply($response);
        });

        $botman->listen();
    }

    private function askOpenAI($message, $apiKey)
    {
        $client = new Client();

        $response = $client->post('https://api.openai.com/v1/engines/davinci/completions', [
            'headers' => [
                'Authorization' => 'Bearer ' . $apiKey,
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'prompt' => $message,
                'max_tokens' => 100,
            ],
        ]);

        return json_decode($response->getBody(), true)['choices'][0]['text'] ?? 'No response from OpenAI';
    }

    public function render()
    {
        return view('livewire.botman.chatbot-messenger');
    }
}
